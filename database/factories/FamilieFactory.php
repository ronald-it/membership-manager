<?php

namespace Database\Factories;

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
