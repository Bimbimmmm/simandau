<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('user_id');
          $table->foreign('user_id')->references('id')->on('users');
          $table->string('notes')->nullable();
          $table->string('status');
          $table->double('total_cost');
          $table->string('shipping_carrier')->nullable();
          $table->double('shipping_cost');
          $table->boolean('is_payed');
          $table->string('payment_proof')->nullable();
          $table->string('shipping_number')->nullable();
          $table->boolean('is_finished');
          $table->timestamp('date_shipped')->nullable();
          $table->timestamp('date_payed')->nullable();
          $table->timestamp('date_finished')->nullable();
          $table->boolean('is_pending');
          $table->string('pending_reason')->nullable();
          $table->boolean('is_rejected');
          $table->string('reject_reason')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
