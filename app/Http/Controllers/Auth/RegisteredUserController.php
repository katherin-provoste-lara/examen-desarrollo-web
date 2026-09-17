<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'rut'      => 'required|string|unique:users,rut',
            'name'   => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email'    => 'required|email|ends_with:@ventasfix.cl|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'rut' => $request->rut,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        event(new Registered($user));

        return redirect()->route('login')->with('success', 'Registro completado. Ahora inicia sesión.');
    }
}
