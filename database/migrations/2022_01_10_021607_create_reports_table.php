<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('state_switch');
            $table->string('state_sys');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('speed');

            //Relacion uno a varios, no va Unique()
            $table->unsignedBigInteger('device_id');

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
        Schema::dropIfExists('reports');
    }
}
