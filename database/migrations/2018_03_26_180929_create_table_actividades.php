<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('servicios_id')->unsigned();
            $table->string('descripcion', 45);
            $table->string('abreviatura', 45);
            $table->enum('categoria', ['Deluxe',  'Extra'])->nullable()->default(null);
            $table->integer('tipos_patente_id')->unsigned();
        
            $table->index('servicios_id','fk_actividades_servicios1_idx');
            $table->index('tipos_patente_id','fk_actividades_tipos_patente1_idx');
        
            $table->foreign('servicios_id')
                ->references('id')->on('servicios');
        
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
        Schema::drop('actividades');

    }
}
