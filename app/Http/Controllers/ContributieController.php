<?php

namespace App\Http\Controllers;

use App\Models\Boekjaar;
use App\Models\Contributie;
use App\Models\Lidsoort;
use Illuminate\Http\Request;

class ContributieController extends Controller
{
    public function toonContributies() {
        $contributies = Contributie::all();
        foreach ($contributies as $contributie) {
            $soort_lid = Lidsoort::find($contributie->soort_lid)->omschrijving;
            $contributie['lidsoort_omschrijving'] = $soort_lid;
            $boekjaar_id = Boekjaar::find($contributie->boekjaar_id)->jaar;
            $contributie['boekjaar'] = $boekjaar_id;
        }
        return view('contributie.toon', ['contributies' => $contributies]);
    }

    public function toonContributieBewerken($id) {
        $contributie = Contributie::find($id);
        $soort_lid = Lidsoort::find($contributie->soort_lid)->omschrijving;
        $contributie['lidsoort_omschrijving'] = $soort_lid;
        $boekjaar_id = Boekjaar::find($contributie->boekjaar_id)->jaar;
        $contributie['boekjaar'] = $boekjaar_id;
        return view('contributie.bewerk', ['contributie' => $contributie]);
    }

    public function bewerkContributie(Request $request, $id) {
        $contributie = Contributie::find($id);
        $contributie->update(['bedrag' => $request->input('bedrag')]);
        return redirect()->route('contributie.toon');
    }
}
