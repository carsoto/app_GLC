<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmbarcacionItinerarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embarcacion_itinerarios', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id')->unsigned();
            $table->integer('embarcacion_id')->unsigned();
            $table->integer('itinerarios_id')->unsigned();
            $table->integer('orden');
            $table->integer('id_dia');
            $table->string('am', 100);
            $table->string('pm', 100);
            
            $table->index('embarcacion_id','fk_embarcacion_itinerarios_embarcacion1_idx');
            $table->index('itinerarios_id','fk_embarcacion_itinerarios_itinerarios1_idx');
        
            $table->foreign('embarcacion_id')
                ->references('id')->on('embarcacion');
        
            $table->foreign('itinerarios_id')
                ->references('id')->on('itinerarios');
        
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
        Schema::drop('embarcacion_itinerarios');

    }
}
