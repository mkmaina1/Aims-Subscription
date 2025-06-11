<?php

namespace Database\Factories;

use App\Models\PasswordPolicy;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasswordPolicyFactory extends Factory
{
    protected $model = PasswordPolicy::class;

    public function definition(): array
    {
        return [
            'min_length' => $this->faker->numberBetween(8, 16),
            'require_uppercase' => $this->faker->boolean(80), // 80% chance true
            'require_number' => $this->faker->boolean(90),
            'require_special' => $this->faker->boolean(70),
        ];
    }
}

