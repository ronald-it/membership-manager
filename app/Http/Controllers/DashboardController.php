<?php

namespace App\Http\Controllers;

use App\Models\Familie;
use Illuminate\Http\Request;
use IntlDateFormatter;

class DashboardController extends Controller
{
    public function index()
    {
        $families = Familie::all();
        $tijdObject = time();
        
        $dagVanMaandObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'd');
        $dagVanMaand = $dagVanMaandObject->format($tijdObject);

        $weekdagObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'EEEE');
        $weekdag = $weekdagObject->format($tijdObject);

        $maandObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
        $maand = $maandObject->format($tijdObject);

        return view('dashboard', ['families' => $families, 'dagVanMaand' => $dagVanMaand, 'weekdag' => $weekdag, 'maand' => $maand]);
    }
}
