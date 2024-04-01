<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use app\models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        // return view('users.index', compact('users'));
        // return view('users.index', ['users' => $users]);
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->is_active = $request->is_active == null || $request->is_active == false ? false : true;
        // dd($request->is_active);
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:80'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'profile_photo_path' => ['string', 'lowercase', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_photo_path' => $request->profile_photo_path,
            'is_active' => $request->is_active,
        ]);

        event(new Registered($user));

        return redirect()->route('users.index')->with('success', 'User created');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function confirmDelete($id)
    {
        dd('pausa');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        // Mostrar la alerta antes de eliminar
        $titulo = 'Confirmación de eliminación';
        $mensaje = '¿Estás seguro de que deseas eliminar este elemento?';
        $accion = "console.log('Elemento eliminado');"; // Puedes personalizar la acción aquí
        $tipo_alerta = 'warning'; // Puedes cambiar el tipo de alerta si lo deseas

        // Llama a la función para mostrar la alerta
        $alerta_html = fncSweetAlert($titulo, $mensaje, $accion, $tipo_alerta);
        if ($alerta_html) {
            $id->delete();
            return redirect()->route('users.index')->with('success', 'User deleted');
        }
        return redirect()->route('users.index');
    }
}
