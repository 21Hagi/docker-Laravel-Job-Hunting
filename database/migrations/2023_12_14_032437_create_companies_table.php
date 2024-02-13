<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('num_of_hires')->nullable()->comment('採用人数');
            $table->float('turnover_rate')->nullable()->comment('離職率');
            $table->float('paid_holidays')->nullable()->comment('有給取得（年平均）');
            $table->integer('annual_income')->nullable()->comment('平均年収');
            $table->float('work_overtime')->nullable()->comment('残業（月）');
            $table->float('starting_salary')->nullable()->comment('初任給');
            $table->string('week_off')->nullable()->comment('週休');
            $table->string('url')->nullable()->comment('URL');
            $table->string('memo', 1000)->nullable()->comment('メモ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
