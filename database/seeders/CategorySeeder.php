<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Wincor',
            'slug' => 'wincor',
            'color' => 'red'
        ]);
        Category::create([
            'name' => 'Glory',
            'slug' => 'glory',
            'color' => 'blue'
        ]);
        Category::create([
            'name' => 'Nets',
            'slug' => 'nets',
            'color' => 'gray'
        ]);
    }
}
