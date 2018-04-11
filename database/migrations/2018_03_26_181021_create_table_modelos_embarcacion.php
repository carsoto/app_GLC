<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableModelosEmbarcacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_embarcacion', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->string('descripcion', 100);
            $table->integer('tipos_embarcacion_id')->unsigned();
            
            $table->index('tipos_embarcacion_id','fk_modelos_embarcacion_tipo_embarcacion1_idx');
            
            $table->foreign('tipos_embarcacion_id')
                ->references('id')->on('tipos_embarcacion');
            
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
        Schema::drop('modelos_embarcacion');

    }
}
