<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect()->route('profiles.profile');
        } else {
            return back()->withErrors([
                'error' => 'E-mail ou mot de passe invalide•s',
            ])->withInput();
        }
    }

    public function registration(RegistrationRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('auth.login')->with('success', "Inscription réussie !");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
