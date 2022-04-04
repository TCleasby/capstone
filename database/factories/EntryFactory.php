<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fda_id' => $this->faker->numberBetween(1, 424151),
            'upload_date' => $this->faker->date(),
            'user_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
