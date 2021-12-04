<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArea extends Migration
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
            $table->integer('like_no')->default(0);
            $table->integer('x')->default(0);
            $table->integer('y')->default(0);
            $table->integer('size')->default(20);
            $table->json('links')->nullable();
            $table->integer('star_index')->default(0);
            $table->integer('area')->default(0);
            $table->integer('shape')->default(0);
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