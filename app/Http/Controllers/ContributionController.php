<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\FiscalYear;
use App\Models\MemberType;
use Exception;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
    public function showContributions() {
        $contributions = Contribution::orderBy('id', 'asc')->get();
        // Member type description and year of fiscal year are searched for with the relevant id's of those tables
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
        // Member type description and year of fiscal year are searched for the contribution that needs to be edited with the relevant id's of those tables
        $memberType = MemberType::find($contribution->member_type)->description;
        $contribution['member_type_description'] = $memberType;
        $fiscalYearId = FiscalYear::find($contribution->fiscal_year_id)->year;
        $contribution['fiscal_year'] = $fiscalYearId;
        return view('contribution.edit', ['contribution' => $contribution]);
    }

    public function editContribution(Request $request, $id) {
        try {
            $request->validate([
                'amount' => 'required|numeric|min:0',
            ]);
            $contribution = Contribution::find($id);
            $contribution->update(['amount' => $request->input('amount')]);
            return redirect()->route('contribution.show');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, make sure your input is correct and try again.');
        }
    }
}
