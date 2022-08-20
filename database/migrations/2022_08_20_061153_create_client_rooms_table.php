<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreign('client_id')->on('clients')->references('id');
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
        Schema::dropIfExists('client_rooms');
    }
}
