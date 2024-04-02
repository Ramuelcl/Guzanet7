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
    public function destroy(User $user)
    {
        // Mostrar una ventana emergente con opciones
        return view('users.confirm-delete', compact('user'));
    }
}
