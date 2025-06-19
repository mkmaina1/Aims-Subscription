<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissions;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['name' => 'Access Finance Management'],
            ['name' => 'Access User Management'],
            ['name' => 'Access Inventory Management'],
            ['name' => 'Access Sales Management'],
            ['name' => 'Access Report Generation'],
            ['name' => 'Access Customer Relationship Management'],
        ];

        foreach ($permissions as $permission) {
            Permissions::firstOrCreate(['name' => $permission['name']]);
        }
    }
}
