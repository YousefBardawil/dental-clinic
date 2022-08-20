<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->time('opening_at');
            $table->time('closing_at');
            $table->foreignId('dentist_id');
            $table->foreign('dentist_id')->on('dentists')->references('id')->cascadeOnDelete();
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
        Schema::dropIfExists('opening_hours');
    }
}
