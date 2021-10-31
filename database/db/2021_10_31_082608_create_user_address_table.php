<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_address', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('address');
        $table->string('province');
        $table->string('city');
        $table->string('district');
        $table->string('village');
        $table->string('zip_code');
        $table->boolean('is_deleted');
        $table->integer('user_id');
        $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_address');
    }
}
