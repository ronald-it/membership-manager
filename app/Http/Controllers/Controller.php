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

    // Functie die op elke pagina uitgevoerd wordt om nieuwe boekjaren en contributies toe te voegen en het soort lid per familielid te updaten
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

            // De juiste id van het soort lid wordt gevonden door de leeftijd van de familielid te vergelijken met de contributies die bij de aanmaak in volgorde van de leeftijd klassen staan
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
