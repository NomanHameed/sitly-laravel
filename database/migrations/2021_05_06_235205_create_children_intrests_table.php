<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenIntrestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children_intrests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->string('interest');

            $table->foreign('child_id')->references('id')->on('user_childrens');
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
        Schema::dropIfExists('children_intrests');
    }
}
