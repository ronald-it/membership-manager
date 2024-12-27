<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GebruikerController extends Authenticatable
{
    public function toonLogin() {
        return view('login');
    }

    public function inloggen(Request $request) {
        // validatie voor het inloggen om het checken of de meegegeven input voldoet aan de voorwaarden binnen de validatie method
        $inlog_waarden = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
        ]);

        // Auth class method voor inloggen
        if (Auth::attempt($inlog_waarden)) {
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function toonRegistratie() {
        return view('registratie');
    }

    public function registreer(Request $request) {
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

        $inlog_waarden = $request->only('email', 'password');

        // Gebruiker wordt bij succesvolle registratie gelijk ingelogd
        if (Auth::attempt($inlog_waarden)) {
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function uitloggen(Request $request) {
        // Auth class method voor uitloggen
        Auth::logout();
        // Sessie data wordt verwijderd
        $request->session()->invalidate();
        // Zorgt voor regeneration van de CSRF token
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
