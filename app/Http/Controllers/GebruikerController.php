<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GebruikerController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function login() {
    }

    public function showRegistration() {
        return view('registratie');
    }

    public function register() {
    }

    public function logout() {
    }
}
