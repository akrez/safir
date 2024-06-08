<?php

namespace Database\Seeders;

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
            'email' => 'akrez.like@gmail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'password' => Hash::make('12345678'),
        ]);
    }
}
