<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'id' => 1, // Manually setting IDs makes linking attractions easier
            'name' => 'Nature',
            'description' => 'Outdoor and scenic locations',
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Culture',
            'description' => 'Historical and educational sites',
        ]);
    }
}
