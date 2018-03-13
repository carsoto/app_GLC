<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAPATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('charter');
            $table->integer('cliente_id');
            $table->float('monto');
            $table->integer('servicio_id');
            $table->integer('actividad_id');
            $table->string('factura');
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
        Schema::drop('apa');
    }
}
