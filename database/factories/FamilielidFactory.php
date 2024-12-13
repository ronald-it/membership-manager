<?php

namespace Database\Factories;
use App\Models\Familie;
use App\Models\Familielid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilielidFactory extends Factory
{
    protected $model = Familielid::class;
    public function definition(): array
    {
        $geboortedatum = $this->faker->dateTimeBetween('-75 years', 'now');
        $leeftijd = Carbon::parse($geboortedatum)->age;
        $soort_lid = match (true) {
            $leeftijd < 8 => 'jeugd',
            $leeftijd < 12 => 'aspirant',
            $leeftijd < 17 => 'junior',
            $leeftijd < 51 => 'senior',
            default => 'oudere',
        };


        return [
            'familie_id' => Familie::factory(),
            'naam' => $this->faker->firstName(),
            'geboortedatum' => $geboortedatum,
            'soort_lid' => $soort_lid,
        ];
    }
}
