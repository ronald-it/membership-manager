<?php

namespace App\Http\Controllers;

use App\Models\Contributie;
use App\Models\Familie;
use App\Models\Familielid;
use App\Models\Lidsoort;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FamilieController extends Controller
{
    public function toonFamilieCreëren()
    {
        return view('familie.creëer');
    }

    public function creëerFamilie(Request $request) {
        Familie::create([
            'naam' => $request->input('naam'),
            'adres' => $request->input('adres'),
        ]);

        return redirect('/');
    }

    public function toonFamilieBewerken($id)
    {
        $familie = Familie::find($id);
        $familieleden = Familielid::where('familie_id', '=', $familie->id)->get();
        foreach ($familieleden as $familielid) {
            $lidsoort = Lidsoort::where('id', '=', $familielid->lidsoort_id)->first();
            $familielid['lidsoort'] = $lidsoort->omschrijving;
            $contributie_type = Contributie::where('soort_lid', '=', $familielid->lidsoort_id)->first();
            $familielid['contributie'] = $contributie_type->bedrag;
        }
        return view('familie.bewerk', ['familie' => $familie, 'familieleden' => $familieleden]);
    }

    public function bewerkFamilie(Request $request, $id) {
        $familie = Familie::find($id);
        $familie->update(['adres' => $request->input('adres')]);
        return redirect()->back();
    }

    public function verwijderFamilie($id) {
        $familie = Familie::find($id);
        $familie->delete();
        return redirect('/');
    }

    public function verwijderFamilielid($id, $lidId) {
        $familie = Familie::find($id);
        $familie->familieleden()->where('id', $lidId)->delete();
        return redirect()->back();
    }

    public function creëerFamilielid(Request $request, $id) {
        $familie = Familie::find($id);
        $leeftijd = Carbon::parse($request->input('geboortedatum'))->age;
        $omschrijving = match (true) {
            $leeftijd < 8 => 'jeugd',
            $leeftijd < 12 => 'aspirant',
            $leeftijd < 17 => 'junior',
            $leeftijd < 51 => 'senior',
            default => 'oudere',
        };
        $lidsoort = Lidsoort::where('omschrijving', '=', $omschrijving)->first();
        $familie->familieleden()->create([
            'familie_id' => $familie->$id,
            'naam' => $request->input('naam'),
            'geboortedatum' => $request->input('geboortedatum'),
            'lidsoort_id' => $lidsoort->id,
        ]);
        return redirect()->back();
    }
}
