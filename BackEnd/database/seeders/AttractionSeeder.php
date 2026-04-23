<?php

namespace Database\Seeders;

use App\Models\Attraction;
use Illuminate\Database\Seeder;

class AttractionSeeder extends Seeder
{
    public function run(): void
    {
        Attraction::create([
            'name' => 'Grand Canyon',
            'category_id' => 1, // Matches Nature
            'coordinate' => '36.0544, -112.1401',
        ]);
    }
}