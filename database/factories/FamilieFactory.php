<?php

namespace Database\Factories;
use App\Models\Familie;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilieFactory extends Factory
{
    protected $model = Familie::class;
    public function definition(): array
    {
        return [
            'naam' => $this->faker->lastName,
            'adres' => $this->faker->address,
        ];
    }
}
