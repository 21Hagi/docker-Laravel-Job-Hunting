<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterviewsSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interviews_setups')->insert([
            [
                'voice_num' => 0,
                'num_of_random_list' => 1,
                'user_id' => 1,
                'created_at' => now()
            ],
        ]);
    }
}