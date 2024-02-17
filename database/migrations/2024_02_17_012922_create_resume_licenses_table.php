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
        Schema::create('resume_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('license1_year')->nullable();
            $table->integer('license1_month')->nullable();
            $table->string('license1_license')->nullable();
            $table->integer('license2_year')->nullable();
            $table->integer('license2_month')->nullable();
            $table->string('license2_license')->nullable();
            $table->integer('license3_year')->nullable();
            $table->integer('license3_month')->nullable();
            $table->string('license3_license')->nullable();
            $table->integer('license4_year')->nullable();
            $table->integer('license4_month')->nullable();
            $table->string('license4_license')->nullable();
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
        Schema::dropIfExists('resume_licenses');
    }
};
