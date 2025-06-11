<?php

namespace Database\Seeders;

use App\Models\PasswordPolicy;
use Illuminate\Database\Seeder;

class PasswordPolicySeeder extends Seeder
{
    public function run(): void
    {
        // One default secure policy
        PasswordPolicy::firstOrCreate([
            'min_length' => 10,
            'require_uppercase' => true,
            'require_number' => true,
            'require_special' => true,
        ]);

        // Optionally generate more for testing
        // PasswordPolicy::factory()->count(3)->create();
    }
}

