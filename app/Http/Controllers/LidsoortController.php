<?php

namespace App\Http\Controllers;

use App\Models\Lidsoort;
use Illuminate\Http\Request;

class LidsoortController extends Controller
{
    public function show() {
        $lidsoorten = Lidsoort::all();
        return view('lidsoort.view', ['lidsoorten' => $lidsoorten]);
    }

    public function edit($id) {
        $lidsoort = Lidsoort::find($id);
        return view('lidsoort.edit', ['lidsoort' => $lidsoort]);
    }

    public function update(Request $request, $id) {
        $lidsoort = Lidsoort::find($id);
        $lidsoort->update(['omschrijving' => $request->input('omschrijving')]);
        return redirect()->route('lidsoort.show');
    }
}
