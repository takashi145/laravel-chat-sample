<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => Hash::make('password123')
        ]);

        User::create([
            'name' => 'test2',
            'email' => 'test2@test.com',
            'password' => Hash::make('password123')
        ]);

        User::create([
            'name' => 'test3',
            'email' => 'test3@test.com',
            'password' => Hash::make('password123')
        ]);
    }
}
