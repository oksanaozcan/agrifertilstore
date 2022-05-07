<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'name' => $this->faker->name(),
          'contract_date' => $this->faker->dateTimeBetween('-200 days','now'),
          'cost' => $this->faker->randomFloat(2,100,900),
          'region' => $this->faker->country()
        ];
    }
}
