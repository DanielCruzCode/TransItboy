<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class CreateCarRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_registrations', function (Blueprint $table) {
            // $table->json('location')->default(new Expression('(JSON_ARRAY())'));
            $table->json('location');
            $table->string('carClass');
            $table->string('carBrand');
            $table->string('line');
            $table->string('model');
            $table->string('bodyWork');
            $table->int('passengers');
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
        Schema::dropIfExists('car_registrations');
    }
}
