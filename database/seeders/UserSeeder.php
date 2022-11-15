<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'type' => 'admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password_admin')
            ],
            [
            'name' => 'user',
            'type' => 'user',
            'email' => 'user@test.com',
            'password' => Hash::make('password_user')
            ]
        ]);
    }
}
