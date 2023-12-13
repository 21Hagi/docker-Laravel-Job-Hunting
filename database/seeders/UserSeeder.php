<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'name' => 'テスト太郎',
                'email' => 'taro-test@example.com',
                'password' => Hash::make('taro-test'),
                'created_at' => now()
            ],
            [
                'name' => 'テスト花子',
                'email' => 'hanako-test@example.com',
                'password' => Hash::make('hanako-test'),
                'create_at' => now(),
            ],
        ]);
    }
}
