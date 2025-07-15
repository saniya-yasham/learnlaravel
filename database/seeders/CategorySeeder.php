<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Technology',
            'description' => 'All about the latest tech trends.'
        ]);

        Category::create([
            'name' => 'Health',
            'description' => 'Tips and news on healthy living.'
        ]);

        Category::create([
            'name' => 'Education',
            'description' => 'Resources and articles for learning.'
        ]);
    }
}
