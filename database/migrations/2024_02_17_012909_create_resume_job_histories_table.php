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
        Schema::create('resume_job_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('job_history1_year')->nullable();
            $table->integer('job_history1_month')->nullable();
            $table->string('job_history1_history')->nullable();
            $table->integer('job_history2_year')->nullable();
            $table->integer('job_history2_month')->nullable();
            $table->string('job_history2_history')->nullable();
            $table->integer('job_history3_year')->nullable();
            $table->integer('job_history3_month')->nullable();
            $table->string('job_history3_history')->nullable();
            $table->integer('job_history4_year')->nullable();
            $table->integer('job_history4_month')->nullable();
            $table->string('job_history4_history')->nullable();
            $table->integer('job_history5_year')->nullable();
            $table->integer('job_history5_month')->nullable();
            $table->string('job_history5_history')->nullable();
            $table->integer('job_history6_year')->nullable();
            $table->integer('job_history6_month')->nullable();
            $table->string('job_history6_history')->nullable();
            $table->integer('job_history7_year')->nullable();
            $table->integer('job_history7_month')->nullable();
            $table->string('job_history7_history')->nullable();
            $table->integer('job_history8_year')->nullable();
            $table->integer('job_history8_month')->nullable();
            $table->string('job_history8_history')->nullable();
            $table->integer('job_history9_year')->nullable();
            $table->integer('job_history9_month')->nullable();
            $table->string('job_history9_history')->nullable();
            $table->integer('job_history10_year')->nullable();
            $table->integer('job_history10_month')->nullable();
            $table->string('job_history10_history')->nullable();
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
        Schema::dropIfExists('resume_job_histories');
    }
};
