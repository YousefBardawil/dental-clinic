<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientDentistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_dentists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreign('client_id')->on('clients')->references('id');
            $table->foreignId('dentist_id');
            $table->foreign('dentist_id')->on('dentists')->references('id');
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
        Schema::dropIfExists('client_dentists');
    }
}
