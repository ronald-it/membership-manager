<?php

namespace App\Http\Controllers;

use App\Models\Lidsoort;
use Illuminate\Http\Request;

class LidsoortController extends Controller
{
    public function toonLidsoorten() {
        $lidsoorten = Lidsoort::all();
        return view('lidsoort.toon', ['lidsoorten' => $lidsoorten]);
    }

    public function toonLidsoortBewerken($id) {
        $lidsoort = Lidsoort::find($id);
        return view('lidsoort.bewerk', ['lidsoort' => $lidsoort]);
    }

    public function bewerkLidsoort(Request $request, $id) {
        $lidsoort = Lidsoort::find($id);
        $lidsoort->update(['omschrijving' => $request->input('omschrijving')]);
        return redirect()->route('lidsoort.toon');
    }
}
