<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCabinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->integer('yates_id')->unsigned();
            $table->integer('planes_cubierta_id')->unsigned();
            $table->integer('tipos_cabina_id')->unsigned();
            $table->integer('cantidad');
        
            $table->index('planes_cubierta_id','fk_cabinas_planes_cubierta1_idx');
            $table->index('tipos_cabina_id','fk_cabinas_tipos_cabina1_idx');
            $table->index('yates_id','fk_cabinas_yates1_idx');
        
            $table->foreign('planes_cubierta_id')
                ->references('id')->on('planes_cubierta');
        
            $table->foreign('tipos_cabina_id')
                ->references('id')->on('tipos_cabina');
        
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
        Schema::drop('cabinas');

    }
}
