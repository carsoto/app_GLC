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
            $table->string('tipo_imagen', 45);
            $table->string('titulo', 100)->nullable();
        
            $table->index('embarcacion_id','fk_imagenes_embarcacion_embarcacion1_idx');
        
            $table->foreign('embarcacion_id')
                ->references('id')->on('embarcacion');
        
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
