<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('fabricante');
            $table->string('modelo');
            $table->string('descripcion')->nullable;

            //Relacion uno a uno, va Unique()
            $table->unsignedBigInteger('device_id')->unique();

            $table->foreign('device_id')
                    ->references('id')
                    ->on('devices')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');

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
        Schema::dropIfExists('vehicles');
    }
}
