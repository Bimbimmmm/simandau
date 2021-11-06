<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketingMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticketing_message', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->text('message');
          $table->string('file')->nullable();
          $table->integer('ticketing_id');
          $table->foreign('ticketing_id')->references('id')->on('ticketing');
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
        Schema::dropIfExists('ticketing_message');
    }
}
