<?php

namespace Database\Factories;

use App\Models\Attraction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attraction>
 */
class AttractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city() . ' Landmark',
            'description' => $this->faker->paragraph(),
            'coordinate' => $this->faker->latitude() . ', ' . $this->faker->longitude(),
            'img_path' => 'images/placeholders/' . $this->faker->numberBetween(1, 10) . '.jpg',
            
            // This automatically creates a Category record if you don't specify one
            'category_id' => \App\Models\Category::factory(), 
        ];
    }
}
