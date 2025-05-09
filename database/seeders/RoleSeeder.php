<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'employee',
            'admin',
            'manage',
        ];

        foreach ($roles as $role_name) {
            Role::create([
                'role_name' => $role_name,
            ]);
        }
    }
}
