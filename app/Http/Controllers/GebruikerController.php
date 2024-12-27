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
        $inlog_waarden = $request->validate([
            'email'=> ['required', 'email'],
            'password'=> ['required'],
        ]);

        if (Auth::attempt($inlog_waarden)) {
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function toonRegistratie() {
        return view('registratie');
    }

    public function registreer(Request $request) {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $inlog_waarden = $request->only('email', 'password');

        if (Auth::attempt($inlog_waarden)) {
            $request->session()->regenerate();

            return redirect('/');
        }
    }

    public function uitloggen(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
