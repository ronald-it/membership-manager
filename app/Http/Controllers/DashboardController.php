<?php

namespace App\Http\Controllers;

use App\Models\Familie;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $families = Familie::all();

        return view('dashboard', ['families' => $families]);
    }
}
