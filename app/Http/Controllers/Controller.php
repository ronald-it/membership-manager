<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\FamilyMember;
use App\Models\FiscalYear;
use App\Models\MemberType;
use Carbon\Carbon;

abstract class Controller
{
    public function __construct() {
        $this->updateData();
    }

    // Function that is executed on every page to add new fiscal years and contributions as well as updating the member type per family member
    public function updateData() {
        $currentYear = Carbon::now()->year;
        $fiscalYear = FiscalYear::where('year', '=', $currentYear)->first();

        if (!$fiscalYear) {
            FiscalYear::create([
                'year' => $currentYear,
            ]);

            $newFiscalYear = FiscalYear::where('year','=', $currentYear)->first();
            $contributionsPreviousYear = Contribution::where('fiscal_year_id', '=', $newFiscalYear->id-1)->get();

            foreach ($contributionsPreviousYear as $contributionPreviousYear) {
                Contribution::create([
                    'age' => $contributionPreviousYear->age,
                    'member_type' => $contributionPreviousYear->member_type,
                    'amount' => $contributionPreviousYear->amount,
                    'fiscal_year_id' => $newFiscalYear->id
                ]);
            }
        }

        $familyMembers = FamilyMember::all();
        $contributionsFirstYear = Contribution::where('fiscal_year_id', '=', 1)->get();
        
        foreach ($familyMembers as $familyMember) {
            $age = Carbon::parse($familyMember->date_of_birth)->age;
            $memberTypeId = 0;

            // The right id for the member type is found by comparing the family member's age with the contributions, which are sorted by age at creation
            foreach ($contributionsFirstYear as $contributionFirstYear) {
                if ($age < $contributionFirstYear->age) {
                    $memberTypeId = $contributionFirstYear->member_type;
                    break;
                }
            };
            
            $memberType = MemberType::find($memberTypeId);
            $familyMember->update(['member_type_id' => $memberType->id]);
        }
    }
}
