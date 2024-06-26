<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'AliAkbar Rezaei',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ])->each(function ($user) {
            $user->assignRole(RolesEnum::ADMIN->value);
        });

        User::factory()->create([
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
