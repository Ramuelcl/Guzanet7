<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
//
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use app\models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = User::all();
        // Accede a las configuraciones
        $campos = config('UserCampos');
        // dd($campos);

        return view('users.index', ['usuario' => $usuario, 'campos' => $campos]);
        // return view('users.index', compact('users'));
        // return view('users.index')->with('users', $users,);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estado = 'crear';
        $usuario = [];
        $campos = config('UserCampos');
        return view('users.create', compact('estado', 'usuario', 'campos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->is_active = $request->is_active == null || $request->is_active == 0 ? false : true;
        $request->profile_photo_path = strtolower($request->profile_photo_path);

        //edicion
        // $userId = $this->user->id; // Obtén el ID del usuario actual

        $rules = [
            'name' => 'required|min:3|max:128',
            'email' => 'required|email|min:10|max:128|unique:users,email',
            //edicion
            // 'email' => "required|email|unique:users,email,$userId,id",
        ];
        if ($request->profile_photo_path != '') {
            $rules['profile_photo_path'] = 'image|max:128';
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('users.create')->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->profile_photo_path = $request->profile_photo_path ?? null;
        $user->is_active = $request->is_active;
        $user->save();

        //  almacenamos la imagen
        if ($request->hasFile('profile_photo_path')) {
            $image = $request->file('profile_photo_path'); // obtener el archivo cargado
            $ext = $image->getClientOriginalExtension();
            $imageName = 'perfil_' . time() . '.' . $ext; // unique image name

            // save image name in directory
            // Guarda la imagen en Storage (carpeta storage/app/public/images/perfiles)
            $path = $image->storeAs('public/images/perfiles', $imageName);
            // $image = move(public_path('images/perfiles'), $imageName);
            // save image name in database
            $user->profile_photo_path = $path;
            $user->save();
        }
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $user = User::FindOrFail($id);

        $request->is_active = $request->is_active == null || $request->is_active == false ? false : true;
        $request->profile_photo_path = strtolower($request->profile_photo_path);
        // dd($request->is_active);
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:128'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_photo_path' => ['string', 'nullable', 'max:128'],
            'is_active' => ['boolean'],
        ]);

        $user->update($request->all());

        // event(new Registered($user));

        return redirect()->route('users.index')->with('success', 'User edited');
    }

    public function confirmDelete($id)
    {
        dd('pausa');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Mostrar una ventana emergente con opciones
        return view('users.confirm-delete', compact('user'));
    }
}
