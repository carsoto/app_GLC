<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTarifario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifario', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('embarcacion_id')->unsigned();
            $table->integer('cant_dias');
            $table->decimal('gross', 8, 2);
            $table->decimal('neto', 8, 2);
            $table->decimal('comision_glc', 8, 2);
        
            $table->index('embarcacion_id','fk_tarifario_embarcacion1_idx');
        
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
        Schema::drop('tarifario');

    }
}
