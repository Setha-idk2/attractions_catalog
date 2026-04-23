<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Attraction;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();

        Attraction::factory(50)->create([
            'category_id' => $categories->random()->id,
        ]);


        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
