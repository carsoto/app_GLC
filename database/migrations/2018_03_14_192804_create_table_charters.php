<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCharters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charters', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->string('codigo');
            $table->string('cliente', 80);
            $table->integer('intermediarios_id')->unsigned();
            $table->string('contrato', 150);
            $table->date('f_inicio');
            $table->date('f_fin');
            $table->string('deluxe');
            $table->double('tarifa_contrato', 8, 2);
            $table->double('tarifa_neta', 8, 2);
            $table->double('comision_intermediario', 8, 2);
            $table->double('comision_glc', 8, 2);
            $table->integer('embarcacion_id')->unsigned();
            
            $table->index('intermediarios_id','fk_charters_intermediarios1_idx');
            $table->index(['embarcacion_id'],'fk_charters_embarcacion1_idx');
        
            $table->foreign('intermediarios_id')->references('id')->on('intermediarios');
        
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
        Schema::drop('charters');

    }
}
