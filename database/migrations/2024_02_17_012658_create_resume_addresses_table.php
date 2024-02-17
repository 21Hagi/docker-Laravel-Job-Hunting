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
        Schema::create('resume_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('zip_code1')->nullable();
            $table->string('address1')->nullable();
            $table->string('building_name1')->nullable();
            $table->string('address1_furigana')->nullable();
            $table->string('zip_code2')->nullable();
            $table->string('address2')->nullable();
            $table->string('building_name2')->nullable();
            $table->string('address2_furigana')->nullable();
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
        Schema::dropIfExists('resume_addresses');
    }
};
