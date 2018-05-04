<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTemporadasAltas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporadas_altas', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('embarcacion_id')->unsigned();
            $table->date('desde')->nullable();
            $table->date('hasta')->nullable();
            $table->decimal('gross', 8, 2)->nullable();
            $table->decimal('neto', 8, 2)->nullable();
            $table->decimal('comision_glc', 8, 2)->nullable();
        
            $table->index('embarcacion_id','fk_temporadas_altas_embarcacion1_idx');
        
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
        Schema::drop('temporadas_altas');

    }
}
