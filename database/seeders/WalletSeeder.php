<?php

namespace Database\Seeders;

use App\Enums\Wallet\StatusEnum;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Wallet::factory()
            ->count(2)
            ->sequence(
                ['title' => 'دلار آمریکا'],
                ['title' => 'یورو اروپا'],
            )
            ->create([
                'status' => StatusEnum::ACTIVE,
                'user_id' => User::first(),
            ]);

        Wallet::factory()
            ->count(1)
            ->sequence(
                ['title' => 'ریال ایران'],
            )
            ->create([
                'status' => StatusEnum::ACTIVE,
                'user_id' => User::latest('id')->first(),
            ]);
    }
}
