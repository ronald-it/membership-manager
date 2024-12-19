<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FamilieController extends Controller
{
    public function create()
    {
        return view('familie.create');
    }

    public function edit()
    {
        return view('familie.edit');
    }
}
