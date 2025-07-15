<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([

            'name' => 'Laravel for Beginners',
            'description' => 'Learn the basics of Laravel framework.',
            'price' => 99.99,
            'discount_percent' => 10,
            'rating' => 4.5,
            'thumbnail' => 'https://placehold.co/600x400',
            'level' => 'Beginner',
            'tags' => 'laravel,php,web',
            'tutors' => 'John Doe',
            'category_id' => 1,
        ]);

       Course::create([
            'name' => 'Advanced PHP',
            'description' => 'Deep dive into advanced PHP topics.',
            'price' => 149.99,
            'discount_percent' => 15,
            'rating' => 4.8,
            'thumbnail' => 'https://placehold.co/600x400',
            'level' => 'Advanced',
            'tags' => 'php,backend,oop',
            'tutors' => 'Jane Smith',
            'category_id' => 2,
        ]);

          Course::create([
            'name' => 'Advanced PHP 2',
            'description' => 'Deep dive into advanced PHP topics.',
            'price' => 149.99,
            'discount_percent' => 15,
            'rating' => 4.8,
            'thumbnail' => 'https://placehold.co/600x400',
            'level' => 'Advanced',
            'tags' => 'php,backend,oop',
            'tutors' => 'Jane Smith',
            'category_id' => 2,
        ]);
    }
}
