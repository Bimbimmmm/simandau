<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->integer('product_id');
          $table->foreign('product_id')->references('id')->on('product');
          $table->integer('qty');
          $table->boolean('is_checkouted');
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
        Schema::dropIfExists('cart');
    }
}
