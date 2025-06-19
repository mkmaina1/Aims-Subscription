<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

public function run(): void
{
    // Super Admin
    User::factory()->create([
        'name' => 'Super Admin',
        'email' => 'superadmin@example.com',
        'role' => 'super_admin',
        'password' => bcrypt('password'),
    ]);

    // Admin
    User::factory()->create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'role' => 'admin',
        'password' => bcrypt('password'),
    ]);

    // Regular Users
    User::factory(5)->create([
        'role' => 'user',
    ]);

    $this->call([
        RoleSeeder::class,
        UserGroupSeeder::class,
        PasswordPolicySeeder::class,
        SubscriptionSeeder::class,
        EntityStatusSeeder::class,
    ]);
}
}
