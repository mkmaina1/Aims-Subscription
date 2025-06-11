<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Chief Executive Officer (CEO)',
            'Chief Technology Officer (CTO)',
            'Chief Operating Officer (COO)',
            'Project Manager',
            'Product Owner',
            'Software Engineer',
            'UI/UX Designer',
            'QA Engineer',
            'DevOps Engineer',
            'System Administrator',
            'Technical Support',
            'HR Manager',
            'Sales Executive',
            'Customer Success Manager',
            'Admin',
            'Intern'
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
    }
}

