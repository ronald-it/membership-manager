<?php

namespace App\Http\Controllers;

use App\Models\Lidsoort;
use Illuminate\Http\Request;

class LidsoortController extends Controller
{
    public function show() {
        $lidsoorten = Lidsoort::all();
        return view('lidsoort', ['lidsoorten' => $lidsoorten]);
    }
}
