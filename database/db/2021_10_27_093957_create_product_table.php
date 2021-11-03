<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->text('description');
        $table->double('price');
        $table->integer('stock');
        $table->integer('weight');
        $table->boolean('is_available');
        $table->boolean('is_deleted');
        $table->integer('user_id');
        $table->foreign('user_id')->references('id')->on('users');
        $table->integer('school_operator_id');
        $table->foreign('school_operator_id')->references('id')->on('school_operator');
        $table->integer('reference_school_type_id');
        $table->foreign('reference_school_type_id')->references('id')->on('reference_school_type');
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
        Schema::dropIfExists('product');
    }
}
