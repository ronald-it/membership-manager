<?php

namespace App\Http\Controllers;

use App\Models\Boekjaar;
use App\Models\Contributie;
use App\Models\Lidsoort;
use Illuminate\Http\Request;

class ContributieController extends Controller
{
    public function show() {
        $contributies = Contributie::all();
        foreach ($contributies as $contributie) {
            $soort_lid = Lidsoort::find($contributie->soort_lid)->omschrijving;
            $contributie['lidsoort_omschrijving'] = $soort_lid;
            $boekjaar_id = Boekjaar::find($contributie->boekjaar_id)->jaar;
            $contributie['boekjaar'] = $boekjaar_id;
        }
        return view('contributie.view', ['contributies' => $contributies]);
    }

    public function edit($id) {
        $contributie = Contributie::find($id);
        $soort_lid = Lidsoort::find($contributie->soort_lid)->omschrijving;
        $contributie['lidsoort_omschrijving'] = $soort_lid;
        $boekjaar_id = Boekjaar::find($contributie->boekjaar_id)->jaar;
        $contributie['boekjaar'] = $boekjaar_id;
        return view('contributie.edit', ['contributie' => $contributie]);
    }

    public function update(Request $request, $id) {
        $contributie = Contributie::find($id);
        $contributie->update(['bedrag' => $request->input('bedrag')]);
        return redirect()->route('contributie.show');
    }
}
