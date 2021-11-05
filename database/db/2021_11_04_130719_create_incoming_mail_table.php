<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingMailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_mail', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('user_id')->nullable();
          $table->foreign('user_id')->references('id')->on('users');
          $table->string('full_name')->nullable();
          $table->string('institution')->nullable();
          $table->string('position')->nullable();
          $table->string('title')->nullable();
          $table->string('importance_level');
          $table->string('contact');
          $table->string('file');
          $table->string('mac_address');
          $table->string('ip_address');
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
        Schema::dropIfExists('incoming_mail');
    }
}
