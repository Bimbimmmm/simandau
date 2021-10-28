<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAvailabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_availability', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('product_id');
          $table->foreign('product_id')->references('id')->on('product');
          $table->string('type');
          $table->integer('stock');
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
        Schema::dropIfExists('product_availability');
    }
}
