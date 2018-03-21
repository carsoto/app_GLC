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
            $table->enum('categoria', ['Deluxe',  'Extra']);

            $table->index('servicios_id','fk_actividades_servicios1_idx');
        
            $table->foreign('servicios_id')->references('id')->on('servicios');
        
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
