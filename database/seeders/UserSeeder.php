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
                    'id' => 207,
                    'user_type' => 'Customer',
                    'username' => 'admin@artd.com',
                    'password' => Hash::make('admin128@aA'),
                    'email' => 'admin@primeflddddy.com',
                    'phone' => '82816054093',
                    'profile_image' => null,
                    'profile_image_webp' => null,
                    'image_attribute' => 'alt="ARTEMYST"',
                    'status' => 'Active',
                    'token' => null,
                    'created_by' => 1,
                    'updated_by' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ], [
                    'id' => 2,
                    'user_type' => 'Customer',
                    'username' => 'customer@artd.com',
                    'password' => Hash::make('123'),
                    'email' => 'customer@primefly.com',
                    'phone' => '828160505583',
                    'profile_image' => null,
                    'profile_image_webp' => null,
                    'image_attribute' => 'alt="ARTEMYSddT"',
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
