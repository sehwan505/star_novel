<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('boards');
        Schema::create('boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('like_no'); 
            $table->integer('x');
            $table->integer('y');
            $table->integer('size');
            $table->json('links');
            $table->string('title');
            $table->longText('story');
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
        Schema::dropIfExists('boards');
    }
}