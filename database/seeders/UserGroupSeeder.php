<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            'Engineering',
            'Product',
            'Design',
            'Quality Assurance',
            'DevOps',
            'Customer Support',
            'Sales & Marketing',
            'Human Resources',
            'Finance',
            'IT & Security'
        ];

        foreach ($groups as $group) {
            UserGroup::firstOrCreate(['name' => $group]);
        }

        // Optional: Generate additional fake ones
        // UserGroup::factory()->count(5)->create();
    }
}
