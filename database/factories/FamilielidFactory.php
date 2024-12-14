<?php

namespace Database\Factories;
use App\Models\Familie;
use App\Models\Familielid;
use App\Models\Lidsoort;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilielidFactory extends Factory
{
    protected $model = Familielid::class;
    public function definition(): array
    {
        $geboortedatum = $this->faker->dateTimeBetween('-75 years', 'now');
        $leeftijd = Carbon::parse($geboortedatum)->age;
        $omschrijving = match (true) {
            $leeftijd < 8 => 'jeugd',
            $leeftijd < 12 => 'aspirant',
            $leeftijd < 17 => 'junior',
            $leeftijd < 51 => 'senior',
            default => 'oudere',
        };

        $lidsoort = Lidsoort::where('omschrijving', '=', $omschrijving)->first();

        return [
            'familie_id' => Familie::factory(),
            'naam' => $this->faker->firstName(),
            'geboortedatum' => $geboortedatum,
            'lidsoort_id' => $lidsoort->id,
        ];
    }
}
