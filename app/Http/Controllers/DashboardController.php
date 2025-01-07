<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\FiscalYear;

class DashboardController extends Controller
{
    // Function that shows that returns the relevant blade while also supplying it with the families and the current date
    public function showFamilies()
    {
        $families = Family::orderBy('id', 'asc')->get();

        $dayOfMonth = date('j');
        $weekday = date('l');
        $month = date('F');

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
