<?php

namespace Database\Seeders;

use App\Models\Boekjaar;
use App\Models\Contributie;
use App\Models\Lidsoort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContributieSeeder extends Seeder
{
    public function run(): void
    {
        $contributie_types = [
            ['leeftijd' => 8, 'soort_lid' => 'jeugd', 'bedrag' => (int) 100 * 0.5], 
            ['leeftijd' => 12, 'soort_lid' => 'aspirant', 'bedrag' => (int) 100 * 0.6], 
            ['leeftijd' => 17, 'soort_lid' => 'junior', 'bedrag' => (int) 100 * 0.25], 
            ['leeftijd' => 50, 'soort_lid' => 'senior', 'bedrag' => (int) 100 * 1], 
            ['leeftijd' => 100, 'soort_lid' => 'oudere', 'bedrag' => (int) 100 * 0.55]];

        foreach ($contributie_types as $contributie_type) {
            $soort_lid = Lidsoort::where('omschrijving', '=', $contributie_type['soort_lid'])->first();
            $boekjaar = Boekjaar::where('jaar', '=', 2024)->first();

            Contributie::create([
                'leeftijd' => $contributie_type['leeftijd'],
                'soort_lid' => $soort_lid->id,
                'bedrag' => $contributie_type['bedrag'],
                'boekjaar_id' => $boekjaar->id
            ]);
        }
    }
}
