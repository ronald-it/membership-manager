<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\FiscalYear;
use App\Models\MemberType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function showFamilyCreate()
    {
        return view('family.create');
    }

    public function createFamily(Request $request) {
        Family::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
        ]);

        return redirect('/');
    }

    public function showFamilyEdit($id)
    {
        $family = Family::find($id);
        $familyMembers = FamilyMember::where('family_id', '=', $family->id)->get();
        // Soort lid omschrijving en contributie bedrag worden opgezocht per familielid en toegevoegd aan de array om het te kunnen weergeven op de familie bewerk pagina
        foreach ($familyMembers as $familyMember) {
            $memberType = MemberType::where('id', '=', $familyMember->member_type_id)->first();
            $familyMember['member_type'] = $memberType->description;
            $currentFiscalYear = FiscalYear::orderBy('year', 'desc')->first();
            $contributionType = Contribution::where('member_type', '=', $familyMember->member_type_id)->where('fiscal_year_id', '=', $currentFiscalYear->id)->first();
            $familyMember['contribution'] = $contributionType->amount;
        }
        return view('family.edit', ['family' => $family, 'familyMembers' => $familyMembers]);
    }

    public function editFamily(Request $request, $id) {
        $family = Family::find($id);
        $family->update(['address' => $request->input('address')]);
        return redirect()->back();
    }

    public function deleteFamily($id) {
        $family = Family::find($id);
        $family->delete();
        return redirect('/');
    }

    public function deleteFamilyMember($id, $familyMemberId) {
        $family = Family::find($id);
        $family->familyMembers()->where('id', $familyMemberId)->delete();
        return redirect()->back();
    }

    public function createFamilyMember(Request $request, $id) {
        $family = Family::find($id);
        $age = Carbon::parse($request->input('date_of_birth'))->age;
        $currentFiscalYear = FiscalYear::orderBy('year', 'desc')->first();
        $contributionsCurrentYear = Contribution::where('fiscal_year_id', '=', $currentFiscalYear->id)->get();
        $memberTypeId = 0;

        // De juiste id van het soort lid wordt gevonden door de leeftijd van de familielid te vergelijken met de contributies die bij de aanmaak in volgorde van de leeftijd klassen staan
        foreach ($contributionsCurrentYear as $contributionCurrentYear) {
            if ($age < $contributionCurrentYear->age) {
                $memberTypeId = $contributionCurrentYear->member_type;
                break;
            }
        };
        
        $memberType = MemberType::find($memberTypeId);
        $family->familyMembers()->create([
            'family_id' => $family->$id,
            'name' => $request->input('name'),
            'date_of_birth' => $request->input('date_of_birth'),
            'member_type_id' => $memberType->id,
        ]);
        return redirect()->back();
    }
}