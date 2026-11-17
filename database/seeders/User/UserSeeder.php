<?php

namespace Database\Seeders\User;

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
        $users = [
            [
                'name' => 'admin',
                'email' => '1@1.ru',
                'password' => Hash::make('password')
            ]
        ];

        foreach ($users as $user) {
            User::query()->create($user);
        }
    }
}
