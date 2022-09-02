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
            $table->id();
            $table->integer('total_balance');
            $table->integer('total_receipt');
            $table->integer('remaining_balance');
            $table->foreignId('client_id');
            $table->foreign('client_id')->on('clients')->references('id');
            $table->foreignId('dentist_id');
            $table->foreign('dentist_id')->on('dentists')->references('id');
            $table->foreignId('service_id');
            $table->foreign('service_id')->on('services')->references('id');
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
