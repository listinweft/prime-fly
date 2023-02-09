<?php

namespace Database\Seeders;

use App\Models\User;
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
        {
            User::insert([
                [
                    'id' => 1,
                    'user_type' => 'Admin',
                    'username' => 'admin@mebashi.com',
                    'password' => Hash::make('admin'),
                    'email' => 'admin@mebashi.com',
                    'phone' => '8281605093',
                    'profile_image' => null,
                    'profile_image_webp' => null,
                    'image_attribute' => 'alt="MEBASHI"',
                    'status' => 'Active',
                    'token' => null,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ], [
                    'id' => 2,
                    'user_type' => 'Customer',
                    'username' => 'customer@mebashi.com',
                    'password' => Hash::make('123'),
                    'email' => 'customer@mebashi.com',
                    'phone' => '8281605083',
                    'profile_image' => null,
                    'profile_image_webp' => null,
                    'image_attribute' => 'alt="MEBASHI"',
                    'status' => 'Active',
                    'token' => null,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
