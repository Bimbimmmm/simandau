<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolOperatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_operator', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->integer('school_id');
          $table->foreign('school_id')->references('id')->on('reference_school');
          $table->boolean('is_active');
          $table->boolean('is_deleted');
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
        Schema::dropIfExists('school_operator');
    }
}
