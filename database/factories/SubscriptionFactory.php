<?php

namespace Database\Factories;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SubscriptionFactory extends Factory
{

public function definition(): array
{
    $start = $this->faker->dateTimeBetween('-1 month', 'now');
    $renewal = Carbon::instance($start)->addMonth();
    
    return [
        'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
        'plan_name' => $this->faker->randomElement(['Basic', 'Standard', 'Premium']),
        'start_date' => $start,
        'renewal_date' => $renewal,
        'end_date' => null,
        'auto_renew' => $this->faker->boolean(80),
        'invoice_path' => null,
        'status' => $this->faker->randomElement(['active', 'expired', 'cancelled']),
    ];

}
}

