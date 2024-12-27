<?php

namespace App\Http\Controllers;

use App\Models\Contributie;
use App\Models\Familie;
use App\Models\Familielid;
use Illuminate\Http\Request;
use IntlDateFormatter;

class DashboardController extends Controller
{
    public function toonFamilies()
    {
        $families = Familie::all();
        $tijdObject = time();
        
        $dagVanMaandObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'd');
        $dagVanMaand = $dagVanMaandObject->format($tijdObject);

        $weekdagObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'EEEE');
        $weekdag = $weekdagObject->format($tijdObject);

        $maandObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
        $maand = $maandObject->format($tijdObject);

        foreach($families as $familie) {
            $familieleden = Familielid::where('familie_id', '=', $familie->id)->get();
            $contributie = 0;
            foreach ($familieleden as $familielid) {
                $contributie_type = Contributie::where('soort_lid', '=', $familielid->lidsoort_id)->first();
                $contributie += $contributie_type->bedrag;
            }
            $familie['contributie'] = $contributie;
        }

        return view('dashboard', ['families' => $families, 'dagVanMaand' => $dagVanMaand, 'weekdag' => $weekdag, 'maand' => $maand]);
    }
}
