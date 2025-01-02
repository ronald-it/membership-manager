<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MemberTypeSeeder::class);

        $this->call(FiscalYearSeeder::class);

        $this->call(ContributionSeeder::class);

        $this->call(FamilySeeder::class);
    }
}
