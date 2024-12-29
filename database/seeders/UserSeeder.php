<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles if they do not exist
        $superAdminRole = Role::firstOrCreate(['name' => 'super admin']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // Create Super Admin user
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin123'),
        ]);

        // Assign role to Super Admin
        $superAdmin->assignRole($superAdminRole);

        // Create a regular User
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@mail.com',
            'password' => bcrypt('user123'),
        ]);

        // Assign role to regular User
        $user->assignRole($userRole);
    }
}
