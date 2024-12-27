<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LidsoortSeeder::class);

        $this->call(BoekjaarSeeder::class);

        $this->call(ContributieSeeder::class);

        $this->call(FamilieSeeder::class);
    }
}
