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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id');
            $table->unsignedBigInteger('address_id');
            $table->string('name');
            $table->text('profile_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('age');
            $table->string('qualification');
            $table->string('specialization');
            $table->string('experience');
            $table->timestamps();
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
