<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interviews')->insert([
            [
                'title' => '自己紹介',
                'question' => '自己紹介をしてください。',
                'order' => 1,
                'display_flg' => 1,
                'user_id' => 1,
                'created_at' => now()
            ],
            [
                'title' => '志望動機',
                'question' => '志望動機を教えてください。',
                'order' => 99,
                'display_flg' => 1,
                'user_id' => 1,
                'created_at' => now()
            ],
            [
                'title' => '自己PR',
                'question' => '自己PRをしてください。',
                'order' => 99,
                'display_flg' => 0,
                'user_id' => 1,
                'created_at' => now()
            ],
        ]);
    }
}