<?php

namespace Database\Seeders;

use App\Models\FiscalYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiscalYearSeeder extends Seeder
{
    public function run(): void
    {
        FiscalYear::create(['year' => 2025]);
    }
}
