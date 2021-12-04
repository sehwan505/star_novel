<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
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
            $table->string('board_no'); //게시글번호
            $table->string('user'); //로그인한 사용자
            $table->integer('like_no'); // 0 or 1         	
            $table->integer('check'); // 0 or 1
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