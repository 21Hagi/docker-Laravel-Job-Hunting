<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert([
            [
                'name' => 'ゲスト',
                'email' => 'guest@example.com',
                'password' => Hash::make('Guest-12345-Password'),
                'created_at' => now()
            ],
            [
                'name' => 'ゲスト２',
                'email' => 'guest2@example.com',
                'password' => Hash::make('guest2-12345-Password'),
                'create_at' => now(),
            ],
        ]);
    }
}
