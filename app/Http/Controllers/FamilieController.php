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

    public function store(Request $request) {
        Familie::create([
            'naam' => $request->input('naam'),
            'adres' => $request->input('adres'),
        ]);

        return redirect('/');
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

    public function update(Request $request, $id) {
        $familie = Familie::find($id);
        $familie->update(['adres' => $request->input('adres')]);
        return redirect()->back();
    }

    public function delete($id) {
        $familie = Familie::find($id);
        $familie->delete();
        return redirect('/');
    }

    public function removeMember($id, $lidId) {
        $familie = Familie::find($id);
        $familie->familieleden()->where('id', $lidId)->delete();
        return redirect()->back();
    }
}
