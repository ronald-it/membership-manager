<?php

namespace Database\Seeders;

use App\Models\Contribution;
use App\Models\FiscalYear;
use App\Models\MemberType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContributionSeeder extends Seeder
{
    public function run(): void
    {
        $contributionTypes = [
            ['age' => 8, 'member_type' => 'youth', 'amount' => (int) 100 * 0.5], 
            ['age' => 12, 'member_type' => 'adolescent', 'amount' => (int) 100 * 0.6], 
            ['age' => 17, 'member_type' => 'junior', 'amount' => (int) 100 * 0.75], 
            ['age' => 50, 'member_type' => 'senior', 'amount' => (int) 100 * 1], 
            ['age' => 100, 'member_type' => 'elder', 'amount' => (int) 100 * 0.55]];

        foreach ($contributionTypes as $contributionType) {
            $memberType = MemberType::where('description', '=', $contributionType['member_type'])->first();
            $fiscalYear = FiscalYear::where('year', '=', 2025)->first();

            Contribution::create([
                'age' => $contributionType['age'],
                'member_type' => $memberType->id,
                'amount' => $contributionType['amount'],
                'fiscal_year_id' => $fiscalYear->id
            ]);
        }
    }
}
