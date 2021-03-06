<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['admin', 'moderator', 'user'];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
            ]);
        }
    }
}
