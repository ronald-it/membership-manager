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
        // Generates a random date between now and at most 75 years ago
        $dateOfBirth = $this->faker->dateTimeBetween('-75 years', 'now');
        $age = Carbon::parse($dateOfBirth)->age;
        $contributionsFirstYear = Contribution::where('fiscal_year_id', '=', 1)->get();
        $memberTypeId = 0;

        // The right id for the member type is found by comparing the family member's age with the contributions, which are sorted by age at creation
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
