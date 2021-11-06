<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketing', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('code');
          $table->string('importance_level');
          $table->string('title');
          $table->boolean('is_finished');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('ticketing');
    }
}
