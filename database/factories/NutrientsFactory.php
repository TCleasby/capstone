<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NutrientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'food_id' => $this->faker->numberBetween(1, 20),
            'nutrientName' => $this->faker->word(),
            'unitName' => $this->faker->word(),
            'value' => $this->faker->randomFloat(2, 0, 1),
        ];
    }
}
