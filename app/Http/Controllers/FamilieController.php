<?php

namespace App\Http\Controllers;

use App\Models\Contributie;
use App\Models\Familie;
use App\Models\Familielid;
use App\Models\Lidsoort;
use Illuminate\Http\Request;

class FamilieController extends Controller
{
    public function create()
    {
        return view('familie.create');
    }

    public function edit($id)
    {
        $familie = Familie::find($id);
        $familieleden = Familielid::where('familie_id', '=', $familie->id)->get();
        foreach ($familieleden as $familielid) {
            $lidsoort = Lidsoort::where('id', '=', $familielid->lidsoort_id)->first();
            $familielid['lidsoort'] = $lidsoort->omschrijving;
            $contributie_type = Contributie::where('soort_lid', '=', $familielid->lidsoort_id)->first();
            $familielid['contributie'] = $contributie_type->bedrag;
        }
        return view('familie.edit', ['familie' => $familie, 'familieleden' => $familieleden]);
    }
}
