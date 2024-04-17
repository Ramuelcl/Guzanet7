<?php

namespace App\Http\Controllers;

// use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
//
use App\Http\Requests\UserRequest;
use app\models\User;

class UserController extends Controller
{
    public function index(): View
    {
        // $users = User::latest('id')->get();
        $users = User::all();
        // Accede a las configuraciones
        $campos = config('UserCampos');
        // dd($campos);

        return view('users.index', compact('users', 'campos'));
        // return view('users.index', ['usuario' => $users, 'campos' => $campos]);
        // return view('users.index')->with('users', $users,);
    }

    public function create(): View
    {
        $estado = 'crear';
        $usuario = ['id' => 0];
        return view('users.create', compact('estado', 'usuario'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        // dd($request);
        // Manejar el campo del checkbox
        $request->is_active = $request->has('is_active'); // 1 si está marcado, 0 si no
        // $request->profile_photo_path = strtolower($request->profile_photo_path);

        // $rules = [
        //     'name' => 'required|min:3|max:128',
        //     'email' => 'required|email|min:10|max:128|unique:users,email',
        //     'is-active' => 'boolean',
        // ];
        if ($request->hasFile('profile_photo_path')) {
            $rules['profile_photo_path'] = 'image|max:256';
        }
        // $validator = $request->all(), $rules);

        // if ($validator->fails()) {
        //     return redirect()->route('users.create')->withInput()->withErrors($validator);
        // }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        // Manejar el campo del checkbox
        // $user->is_active = $request->input('is_active', 0); // Valor predeterminado: 0 si no está marcado

        //  almacenamos la imagen
        // if ($request->hasFile('profile_photo_path')) {
        //     $image = $request->file('profile_photo_path'); // obtener el archivo cargado
        //     $ext = $image->getClientOriginalExtension();
        //     $imageName = strtolower('Perfil_' . time() . '.' . $ext); // unique image name

        //     // Guarda la imagen en Storage (carpeta storage/app/public/images/avatars)
        //     $path = Storage::disk('public')->put('images/avatars', $imageName);

        //     // save image name in database
        //     $user->profile_photo_path = $path;
        // }
        $ok = $user->save();

        if ($ok) {
            return redirect()
                ->route('users.index')
                ->with('success', "User id=$user->id created successfully.");
        } else {
            return redirect()->route('users.create')->with('error', 'Some problem occure.');
        }
    }

    public function show(string $id): View
    {
        // $idIni = $id;
        // $primero = User::min('id');
        // $ultimo = User::max('id');
        $estado = 'mostrar';
        if ($id) {
            $usuario = User::findOrFail($id);
        }
        // if ($accion === 'anterior' && $id > $primero) {
        //     // Obtener el registro anterior
        //     $id = User::where('id', '<', $id)->orderBy('id', 'desc')->first()->id;
        // } elseif ($accion === 'siguiente' && $id < $ultimo) {
        //     // Obtener el siguiente registro
        //     $id = User::where('id', '>', $id)->orderBy('id')->first()->id;
        // }
        // dump($idIni, $primero, $ultimo, $accion, $usuario);
        return view('users.show', compact('estado', 'usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        $estado = 'editar';
        $campos = config('UserCampos');
        return view('users.edit', compact('estado', 'usuario', 'campos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $user = User::FindOrFail($id);
        // dd($request);

        // $request->profile_photo_path = strtolower($request->profile_photo_path);
        // dd($request->is_active);

        // $request->validate([
        //     'name' => ['required', 'string', 'min:3', 'max:64'],
        //     'email' => ['required', 'string', 'email', 'max:128'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'profile_photo_path' => ['file', 'nullable', 'max:256'],
        //     'is_active' => ['boolean'],
        // ]);
        // if ($request->hasFile('profile_photo_path')) {
        //     // delete image
        //     Storage::disk('public')->delete($user->profile_photo_path);

        //     $filePath = Storage::disk('public')->put('images/avatars', request()->file('profile_photo_path'), 'public');
        //     $validated['profile_photo_path'] = $filePath;
        // }
        $ok = $user->update($request->all());

        if ($ok) {
            return redirect()
                ->route('users.index')
                ->with('success', "User id=$user->id edited successfully.");
        } else {
            return redirect()->route('users.edit')->with('error', 'Some problem occure.');
        }
    }

    public function destroy(string $id): RedirectResponse
    {
        if ($id != 1 && Auth::user()->id != $id) {
            $user = User::findOrFail($id);

            Storage::disk('public')->delete($user->profile_photo_path);

            $ok = $user->delete($id);

            if ($ok) {
                return redirect()->route('users.index')->with('success', 'User deleted successfully.');
            } else {
                return redirect()->route('users.index')->with('error', 'Some problem occure.');
            }
        } else {
            return redirect()->route('users.index')->with('error', "This  user can't deleted.");
        }
    }
}
