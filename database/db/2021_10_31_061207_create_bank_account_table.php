<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_account', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('bank_name');
          $table->string('owner_name');
          $table->string('account_number');
          $table->string('bank_icon');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->integer('school_operator_id');
          $table->foreign('school_operator_id')->references('id')->on('school_operator');
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
        Schema::dropIfExists('bank_account');
    }
}
