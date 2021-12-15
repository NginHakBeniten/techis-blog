<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'role' => 'Admin',
                    'is_admin' => true,
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => 'editor',
                    'email' => 'editor@gmail.com',
                    'role' => 'Editor',
                    'is_admin' => false,
                    'password' => Hash::make('123456'),
                ]
            ]
        );
    }
}
