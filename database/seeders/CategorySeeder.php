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
            'title' => 'category 1',
            'description' => 'lorem ipsum 1',
        ]);
        Category::create([
            'title' => 'category 2',
            'description' => 'lorem ipsum 2',
        ]);
    }
}
