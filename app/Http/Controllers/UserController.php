<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserController extends Authenticatable
{
    public function showLogin() {
        return view('login');
    }

    public function login(Request $request) {
        // validatie voor het inloggen om het checken of de meegegeven input voldoet aan de voorwaarden binnen de validatie method
        $loginValues = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
        ]);

        // Auth class method voor inloggen
        if (Auth::attempt($loginValues)) {
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function showRegistration() {
        return view('registration');
    }

    public function register(Request $request) {
        // validatie voor het registreren om het checken of de meegegeven input voldoet aan de voorwaarden binnen de validatie method
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required']
        ]);

        // Gebruiker wordt aangemaakt en het wachtwoord wordt meegegeven als een hash door middel van een ingebouwde method van de Hash class
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $loginValues = $request->only('email', 'password');

        // Gebruiker wordt bij succesvolle registratie gelijk ingelogd
        if (Auth::attempt($loginValues)) {
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function logout(Request $request) {
        // Auth class method voor uitloggen
        Auth::logout();
        // Sessie data wordt verwijderd
        $request->session()->invalidate();
        // Zorgt voor regeneration van de CSRF token
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
