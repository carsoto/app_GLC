<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSitiosTuristicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sitios_turisticos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->string('sitio', 45);
            $table->integer('actividades_id')->unsigned();
            $table->integer('islas_id')->unsigned();
        
            $table->index('actividades_id','fk_sitios_turisticos_actividades1_idx');
            $table->index('islas_id','fk_sitios_turisticos_islas1_idx');
        
            $table->foreign('actividades_id')
                ->references('id')->on('actividades');
        
            $table->foreign('islas_id')
                ->references('id')->on('islas');
        
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
        Schema::drop('sitios_turisticos');

    }
}
