<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePuertos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puertos', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->string('descripcion', 100);
            $table->string('provincia', 100);
            $table->integer('islas_id')->unsigned();
        
            $table->index('islas_id','fk_puertos_islas1_idx');
        
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
        Schema::drop('puertos');

    }
}
