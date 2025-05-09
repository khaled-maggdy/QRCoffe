<?php

namespace Database\Seeders;

use App\Models\BranchProduct;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shift;
use App\Models\Table;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Table::factory(50)->create();
         User::factory(100)->create();
         Shift::factory(100)->create();
       Order::factory(50)->create();
         OrderItem::factory(100)->create();
          BranchProduct::factory(100)->create();


    }
}
