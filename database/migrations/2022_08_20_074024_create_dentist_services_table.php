<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentistServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentist_services', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('dentist_services');
    }
}
