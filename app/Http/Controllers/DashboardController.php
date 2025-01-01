<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\FiscalYear;
use IntlDateFormatter;

class DashboardController extends Controller
{
    // Functie om de relevant blade te tonen waarbij ook de families en de huidige datum worden meegegeven
    public function showFamilies()
    {
        $families = Family::all();
        $timeObject = time();
        
        $dayOfMonthObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'd');
        $dayOfMonth = $dayOfMonthObject->format($timeObject);

        $weekdayObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'EEEE');
        $weekday = $weekdayObject->format($timeObject);

        $monthObject = new IntlDateFormatter('nl_NL', IntlDateFormatter::NONE, IntlDateFormatter::NONE, null, null, 'MMMM');
        $month = $monthObject->format($timeObject);

        foreach($families as $family) {
            $familyMembers = FamilyMember::where('family_id', '=', $family->id)->get();
            $contribution = 0;
            $currentFiscalYear = FiscalYear::orderBy('year', 'desc')->first();
            foreach ($familyMembers as $familyMember) {
                $contributionType = Contribution::where('member_type', '=', $familyMember->member_type_id)->where('fiscal_year_id', '=', $currentFiscalYear->id)->first();
                $contribution += $contributionType->amount;
            }
            $family['contribution'] = $contribution;
        }

        return view('dashboard', ['families' => $families, 'dayOfMonth' => $dayOfMonth, 'weekday' => $weekday, 'month' => $month]);
    }
}
