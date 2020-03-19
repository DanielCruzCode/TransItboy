<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('car_registrations', function ($collection) {
        //     $collection->index(
        //         'username',
        //         null,
        //         null,
        //         [
        //             'sparse' => true,
        //             'unique' => true,
        //             'background' => true,
        //         ]
        //     );
        // });

        Schema::create('car_registrations', function (Blueprint $table) {
            $table->array('location');
            $table->string('carClass');
            $table->string('brand');
            $table->string('line');
            $table->string('model');
            $table->string('bodyWork');
            $table->string('passengers');
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
