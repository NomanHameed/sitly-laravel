<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->date('dob')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('self_description')->nullable();
            $table->string('language')->nullable();
            $table->string('pay_range')->nullable();
            $table->string('experience')->nullable();
            $table->string('role_type')->nullable();
            $table->boolean('after_school')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
}
