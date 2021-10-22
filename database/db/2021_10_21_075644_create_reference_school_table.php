<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_school', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('school_name');
          $table->string('address');
          $table->string('city');
          $table->string('district');
          $table->string('village');
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
        Schema::dropIfExists('reference_school');
    }
}
