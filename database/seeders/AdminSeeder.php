<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'user_name' => 'admin',
            'avatar' => 'avatar/avatar.jpg',
            'user_role' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'),
            'registered_at' => now(),
        ]);
    }
}
