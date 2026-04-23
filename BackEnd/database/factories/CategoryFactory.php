<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Generates a single, unique word for the category (e.g., "Nature", "Urban")
            'name' => $this->faker->unique()->word(), 
            
            // Generates a short sentence for the description
            'description' => $this->faker->sentence(),
        ];
    }
}
