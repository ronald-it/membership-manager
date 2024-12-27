<?php

namespace Database\Factories;
use App\Models\Contributie;
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
        // Genereert een willekeurige datum tussen nu en maximaal 75 jaar geleden
        $geboortedatum = $this->faker->dateTimeBetween('-75 years', 'now');
        $leeftijd = Carbon::parse($geboortedatum)->age;
        $contributiesEersteJaar = Contributie::where('boekjaar_id', '=', 1)->get();
        $lidsoort_id = 0;

        // De juiste id van het soort lid wordt gevonden door de leeftijd van de familielid te vergelijken met de contributies die bij de aanmaak in volgorde van de leeftijd klassen staan
        foreach ($contributiesEersteJaar as $contributieEersteJaar) {
            if ($leeftijd < $contributieEersteJaar->leeftijd) {
                $lidsoort_id = $contributieEersteJaar->soort_lid;
                break;
            }
        };

        $lidsoort = Lidsoort::find($lidsoort_id);

        return [
            'familie_id' => Familie::factory(),
            'naam' => $this->faker->firstName(),
            'geboortedatum' => $geboortedatum,
            'lidsoort_id' => $lidsoort->id,
        ];
    }
}
