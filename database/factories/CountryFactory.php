<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country = $this->faker->country();
        return [
            'name' => $country,
            'email' => Str::slug($country)
        ];
    }
}
