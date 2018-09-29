<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('grade');
            $table->integer('year');
            $table->string('odd');
            $table->integer('price')->nullable();
            $table->string('pref');
            $table->string('data_id');
            $table->string('color');
            $table->string('photo_url');
            $table->timestamps();

            $table->index(['name', 'year', 'odd', 'price']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_data');
    }
}
