<?php

namespace Database\Factories;

use App\Models\Fertilizer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Culture>
 */
class CultureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      return [
        'name' => $this->faker->word(),
        'nitrogen' => $this->faker->numberBetween(1, 3),
        'phosphorus' => $this->faker->numberBetween(1, 3),
        'potassium' => $this->faker->numberBetween(1, 3),
        'fertilizer_id' => $this->faker->numberBetween(1, 2),
        'region' => $this->faker->country(),
        'price' => $this->faker->numberBetween(100, 600),
        'description' => $this->faker->paragraph(),
        'purpose' => $this->faker->paragraph(1)
      ];
    }
}
