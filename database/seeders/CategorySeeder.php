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
        $categories = [
            'Hot Drinks',
            'Cold Drinks',
            'Coffee',
            'Tea',
            'Milkshakes & Smoothies',
            'Desserts',
            'Pastries',
            'Snacks',
            'Sandwiches',
            'Breakfast',
        ];

        foreach ($categories as $category_name) {
            Category::create([
                'category_name' => $category_name,
            ]);
        }
    }
}