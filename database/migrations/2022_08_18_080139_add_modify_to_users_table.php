<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddModifyToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('password');

            $table->date('date_of_birth');
            $table->string('mobile');
            $table->integer('age');
            $table->enum('gender',['Male','Female']);
            $table->enum('status',['Single','Married']);
            $table->foreignId('city_id');
            $table->foreign('city_id')->on('cities')->references('id')->cascadeOnDelete();
            $table->morphs('actor');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
