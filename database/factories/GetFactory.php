<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 4)),
            'name' => $this->faker->name()
        ];
    }
}
