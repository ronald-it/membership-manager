<?php

namespace Database\Seeders;

use App\Models\MemberType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberTypeSeeder extends Seeder
{
    public function run(): void
    {
        $memberTypes = ['youth', 'adolescent', 'junior', 'senior', 'elder'];
        foreach ($memberTypes as $memberType) {
            MemberType::create(['description' => $memberType]);
        }
    }
}
