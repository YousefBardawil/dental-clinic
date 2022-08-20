<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentist_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dentist_id');
            $table->foreign('dentist_id')->on('dentists')->references('id');
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
        Schema::dropIfExists('dentist_rooms');
    }
}
