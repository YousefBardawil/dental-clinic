<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('time');
            $table->foreignId('dentist_id');
            $table->foreign('dentist_id')->on('dentists')->references('id');
            $table->foreignId('client_id');
            $table->foreign('client_id')->on('clients')->references('id');
            $table->foreignId('service_id');
            $table->foreign('service_id')->on('services')->references('id');
            $table->foreignId('room_id');
            $table->foreign('room_id')->on('rooms')->references('id');
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
        Schema::dropIfExists('appointments');
    }
}
