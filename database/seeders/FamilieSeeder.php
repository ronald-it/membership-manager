<?php

namespace Database\Seeders;

use App\Models\Familie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilieSeeder extends Seeder
{
    public function run(): void
    {
        Familie::factory(10)->hasFamilieleden(5)->create();
    }
}
