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
            $table->string('nombre_embarcacion', 150);
            $table->integer('cant_pasajeros');
            $table->integer('tipo_embarcacion_id')->unsigned();
        
            $table->index('tipo_embarcacion_id','fk_embarcacion_tipo_embarcacion1_idx');
        
            $table->foreign('tipo_embarcacion_id')->references('id')->on('tipo_embarcacion');
        
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
