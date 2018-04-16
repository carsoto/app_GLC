<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImagenesEmbarcacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_embarcacion', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('embarcacion_id')->unsigned();
            $table->integer('tipos_imagen_id')->unsigned();
            $table->string('titulo', 100)->nullable();
            $table->binary('imagenes_embarcacion');
        
            $table->index('embarcacion_id','fk_imagenes_embarcacion_embarcacion1_idx');
            $table->index('tipos_imagen_id','fk_imagenes_embarcacion_tipos_imagen1_idx');
        
            $table->foreign('embarcacion_id')
                ->references('id')->on('embarcacion');
        
            $table->foreign('tipos_imagen_id')
                ->references('id')->on('tipos_imagen');
        
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
        Schema::drop('imagenes_embarcacion');

    }
}
