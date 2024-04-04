<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SauceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true),
            'manufacturer' => $this->faker->company,
            'description' => $this->faker->sentences(4, true),
            'mainPepper' => $this->faker->word,
            'imageUrl' => $this->faker->imageUrl(),
            'heat' => $this->faker->numberBetween(1, 10),
            'userId' => 1,
        ];
    }
}
