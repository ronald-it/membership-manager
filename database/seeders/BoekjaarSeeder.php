<?php

namespace Database\Seeders;

use App\Models\Boekjaar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoekjaarSeeder extends Seeder
{
    public function run(): void
    {
        Boekjaar::create(['jaar' => 2024]);
    }
}
