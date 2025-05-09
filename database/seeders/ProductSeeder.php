<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            'Espresso',
            'Americano',
            'Cappuccino',
            'Latte',
            'Mocha',
            'Macchiato',
            'Turkish Coffee',
            'Iced Coffee',
            'Cold Brew',
            'Affogato',
            'Hot Chocolate',
            'Green Tea',
            'Black Tea',
            'Chai Latte',
            'Smoothie',
            'Milkshake',
            'Croissant',
            'Muffin',
            'Cheesecake',
            'Brownie',
            'Cookies',
            'Sandwich',
            'Bagel with Cream Cheese',
            'Toast with Avocado',
        ];

        foreach ($products as $product) {
            Product::create([
                'product_name' => $product,
                'category_id' => Category::all()->random()->id,
            ]);
        }
    }
}
