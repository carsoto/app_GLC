<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmbarcacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarcacion', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->string('nombre', 150);
            $table->string('capacidad', 45);
            $table->string('nro_tripulantes', 150);
            $table->integer('puerto_registro_id')->unsigned();
            $table->string('eslora', 45);
            $table->string('manga', 45);
            $table->string('puntal', 45);
            $table->string('velocidad_crucero', 45)->nullable();
            $table->enum('estabilizadores', ['Si',  'No']);
            $table->enum('ameneties', ['Si',  'No']);
            $table->enum('internet', ['Si',  'No']);
            $table->enum('trajes_neopreno', ['Si',  'No']);
            $table->enum('equipo_snorkel', ['Si',  'No']);
            $table->integer('kayacks')->nullable();
            $table->integer('paddle_boards')->nullable();
            $table->string('anyo_construccion', 5)->nullable();
            $table->string('refit', 5)->nullable();
            $table->integer('companias_embarcacion_id')->unsigned();
            $table->integer('modelos_embarcacion_id')->unsigned();
            $table->integer('tipos_patente_id')->unsigned();
            $table->string('politicas_pago', 500);
            $table->string('cancelaciones', 500);
            $table->decimal('tarifa_temp_alta', 8, 2)->nullable()->default(null);

            $table->index('puerto_registro_id','fk_embarcacion_puertos1_idx');
            $table->index('companias_embarcacion_id','fk_embarcacion_companias_embarcacion1_idx');
            $table->index('modelos_embarcacion_id','fk_embarcacion_modelos_embarcacion1_idx');
            $table->index('tipos_patente_id','fk_embarcacion_tipos_patente1_idx');
        
            $table->foreign('puerto_registro_id')
                ->references('id')->on('puertos');
        
            $table->foreign('companias_embarcacion_id')
                ->references('id')->on('companias_embarcacion');
        
            $table->foreign('modelos_embarcacion_id')
                ->references('id')->on('modelos_embarcacion');
        
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
        Schema::drop('embarcacion');

    }
}