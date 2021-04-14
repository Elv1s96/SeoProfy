<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersArray = [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'Admin@admin.com',
                'role' => 1,
                'password' => '1q2w3e4r',
                'phone' => '0671234567'
            ],
            [
                'id' => 2,
                'name' => 'Moderator',
                'email' => 'Moderator@moderator.com',
                'role' => 2,
                'password' => '1q2w3e4r',
                'phone' => '0671234567'
            ],
            [
                'id' => 3,
                'name' => 'User',
                'email' => 'User@user.com',
                'role' => 3,
                'password' => '1q2w3e4r',
                'phone' => '0671234567'
            ]
        ];
        foreach ($usersArray as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'role_id' => $user['role'],
                'password' => Hash::make($user['password']),
                'phone' => $user['phone']
            ]);
        }
        User::factory(997)->create();

    }
}
