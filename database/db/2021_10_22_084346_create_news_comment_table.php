<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_comment', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('news_id');
          $table->foreign('news_id')->references('id')->on('news');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->string('comment');
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
        Schema::dropIfExists('news_comment');
    }
}
