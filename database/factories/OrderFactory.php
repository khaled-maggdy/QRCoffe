<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Shift;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'table_id' => Table::all()->random()->id,
            'branch_id' => Branch::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'shift_id' => Shift::all()->random()->id,
            'price' => fake()->randomNumber(2),
            'discount' => fake()->randomFloat(4,0.1,1),
            'total_price' => fake()->randomNumber(3),
        ];
    }
}
