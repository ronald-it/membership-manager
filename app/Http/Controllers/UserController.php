<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
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
        try {
            // Login validation to check whether the user input fulfills the validation method demands
            $loginValues = $request->validate([
                'email'=> ['required', 'email'],
                'password'=> ['required'],
            ]);
            
            // Auth class method voor inloggen
            if (Auth::attempt($loginValues)) {
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return back()->with('error','Invalid email or password. Please try again.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, make sure your input is correct and try again.');
        }
    }

    public function showRegistration() {
        return view('registration');
    }

    public function register(Request $request) {
        try {
            // Registration validation to check whether the user input fulfills the validation method demands
            $request->validate([
                'name' => ['required'],
                'email' => ['required', 'unique:users,email', 'email'],
                'password' => ['required']
            ]);
            
            // User is created and password is passed down as a Hash with an in built method of the Hash class
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            $loginValues = $request->only('email', 'password');
            
            // User is immediately logged in at successful registration
            if (Auth::attempt($loginValues)) {
                $request->session()->regenerate();
                return redirect('/');
            } else {
                return redirect()->back()->with('error', 'Something went wrong, make sure your input is correct and try again.');
            }            
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, make sure your input is correct and try again.');
        }
    }

    public function logout(Request $request) {
        // Auth class method for logging out
        Auth::logout();
        // Session data is deleted
        $request->session()->invalidate();
        // Regenerates the CSRF token
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
