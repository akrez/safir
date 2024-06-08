<?php

namespace Database\Factories;

use App\Enums\Wallet\StatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'ریال ایران',
            'status' => StatusEnum::ACTIVE,
            'user_id' => User::first(),
        ];
    }
}
