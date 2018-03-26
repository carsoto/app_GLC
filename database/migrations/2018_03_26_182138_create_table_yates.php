<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yates', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->string('nombre', 150);
            $table->string('capacidad', 45);
            $table->string('nro_tripulantes', 45);
            $table->integer('puerto_registro_id')->unsigned();
            $table->string('loa', 45);
            $table->string('beam', 45);
            $table->string('velocidad_crucero', 45);
            $table->enum('estabilizadores', ['Si',  'No']);
            $table->enum('ameneties', ['Si',  'No']);
            $table->enum('internet', ['Si',  'No']);
            $table->enum('trajes_neopreno', ['Si',  'No']);
            $table->enum('equipo_snorkel', ['Si',  'No']);
            $table->integer('kayacks');
            $table->integer('paddle_boards');
            $table->string('anyo_construccion', 5);
            $table->string('refit', 5);
            $table->string('propietario', 45)->nullable();
            $table->decimal('tarifa', 8, 2);
            $table->integer('companias_yate_id')->unsigned();
            $table->integer('modelos_yate_id')->unsigned();
            $table->integer('tipos_patente_id')->unsigned();
        
            $table->index('puerto_registro_id','fk_yate_puertos1_idx');
            $table->index('companias_yate_id','fk_yates_companias_yate1_idx');
            $table->index('modelos_yate_id','fk_yates_modelos_yate1_idx');
            $table->index('tipos_patente_id','fk_yates_tipos_patente1_idx');
        
            $table->foreign('puerto_registro_id')
                ->references('id')->on('puertos');
        
            $table->foreign('companias_yate_id')
                ->references('id')->on('companias_yate');
        
            $table->foreign('modelos_yate_id')
                ->references('id')->on('modelos_yate');
        
            $table->foreign('tipos_patente_id')
                ->references('id')->on('tipos_patente');
        
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
        Schema::drop('yates');

    }
}
