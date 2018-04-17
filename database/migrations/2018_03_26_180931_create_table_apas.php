<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableApas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->integer('soporte_apa_id')->unsigned();
            $table->integer('charters_id')->unsigned();
        
            $table->index('soporte_apa_id','fk_apa_soporte_apa1_idx');
            $table->index('charters_id','fk_apa_charters1_idx');
        
            $table->foreign('soporte_apa_id')
                ->references('id')->on('soportes_apa');
        
            $table->foreign('charters_id')
                ->references('id')->on('charters');
        
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
        Schema::drop('apas');

    }
}
