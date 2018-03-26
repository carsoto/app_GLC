<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTiposCharter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_charter', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('charters_id')->unsigned();
            $table->integer('nro_pax');
            $table->date('f_inicio');
            $table->date('f_fin');
            $table->enum('deluxe', ['Si',  'No']);
            $table->decimal('tarifa_contrato', 8, 2);
            $table->decimal('tarifa_neta', 8, 2);
            $table->decimal('comision_intermediario', 8, 2);
            $table->decimal('comision_glc', 8, 2);
            $table->integer('yates_id')->unsigned();
        
            $table->index('charters_id','fk_tipo_charter_charters1_idx');
            $table->index('yates_id','fk_tipos_charter_yates1_idx');
        
            $table->foreign('charters_id')
                ->references('id')->on('charters');
        
            $table->foreign('yates_id')
                ->references('id')->on('yates');
        
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
        Schema::drop('tipos_charter');

    }
}