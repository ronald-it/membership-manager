<?php

namespace Database\Factories;
use App\Models\Contribution;
use App\Models\Family;
use App\Models\FamilyMember;
use App\Models\MemberType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyMemberFactory extends Factory
{
    protected $model = FamilyMember::class;
    public function definition(): array
    {
        // Genereert een willekeurige datum tussen nu en maximaal 75 jaar geleden
        $dateOfBirth = $this->faker->dateTimeBetween('-75 years', 'now');
        $age = Carbon::parse($dateOfBirth)->age;
        $contributionsFirstYear = Contribution::where('fiscal_year_id', '=', 1)->get();
        $memberTypeId = 0;

        // De juiste id van het soort lid wordt gevonden door de leeftijd van de familielid te vergelijken met de contributies die bij de aanmaak in volgorde van de leeftijd klassen staan
        foreach ($contributionsFirstYear as $contributionFirstYear) {
            if ($age < $contributionFirstYear->age) {
                $memberTypeId = $contributionFirstYear->member_type;
                break;
            }
        };

        $memberType = MemberType::find($memberTypeId);

        return [
            'family_id' => Family::factory(),
            'name' => $this->faker->firstName(),
            'date_of_birth' => $dateOfBirth,
            'member_type_id' => $memberType->id,
        ];
    }
}
