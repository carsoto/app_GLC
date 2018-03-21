<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipoCharter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_charter', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('charters_id')->unsigned();
            $table->integer('embarcacion_id')->unsigned();
            $table->integer('nro_pax');
            $table->date('f_inicio');
            $table->date('f_fin');
            $table->enum('deluxe', ['Si', 'No']);
            $table->float('tarifa_contrato', 8, 2);
            $table->float('tarifa_neta', 8, 2);
            $table->float('comision_intermediario', 8, 2);
            $table->float('comision_glc', 8, 2);
        
            $table->index('charters_id','fk_tipo_charter_charters1_idx');
            $table->index('embarcacion_id','fk_tipo_charter_embarcacion1_idx');
        
            $table->foreign('charters_id')->references('id')->on('charters');
        
            $table->foreign('embarcacion_id')->references('id')->on('embarcacion');
        
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
        Schema::drop('tipo_charter');

    }
}
