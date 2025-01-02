<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\FiscalYear;
use App\Models\MemberType;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function showContributions() {
        $contributions = Contribution::all();
        // soort lid omschrijving en jaar van het boekjaar worden opgezocht per contributie op basis van de id's van de relevante tabellen
        foreach ($contributions as $contribution) {
            $memberType = MemberType::find($contribution->member_type)->description;
            $contribution['member_type_description'] = $memberType;
            $fiscalYearId = FiscalYear::find($contribution->fiscal_year_id)->year;
            $contribution['fiscal_year'] = $fiscalYearId;
        }
        return view('contribution.show', ['contributions' => $contributions]);
    }

    public function showContributionEdit($id) {
        $contribution = Contribution::find($id);
        // soort lid omschrijving en jaar van het boekjaar wordt opgezocht voor de contributie die bewerkt moet worden op basis van de id's van de relevante tabellen
        $memberType = MemberType::find($contribution->member_type)->description;
        $contribution['member_type_description'] = $memberType;
        $fiscalYearId = FiscalYear::find($contribution->fiscal_year_id)->year;
        $contribution['fiscal_year'] = $fiscalYearId;
        return view('contribution.edit', ['contribution' => $contribution]);
    }

    public function editContribution(Request $request, $id) {
        $contribution = Contribution::find($id);
        $contribution->update(['amount' => $request->input('amount')]);
        return redirect()->route('contribution.show');
    }
}
