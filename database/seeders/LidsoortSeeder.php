<?php

namespace Database\Seeders;

use App\Models\Lidsoort;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LidsoortSeeder extends Seeder
{
    public function run(): void
    {
        $lidsoorten = ['jeugd', 'aspirant', 'junior', 'senior', 'oudere'];
        foreach ($lidsoorten as $lidsoort) {
            Lidsoort::create(['omschrijving' => $lidsoort]);
        }
    }
}
