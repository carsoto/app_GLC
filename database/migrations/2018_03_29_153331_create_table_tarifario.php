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
            $table->integer('yates_id')->unsigned();
            $table->decimal('cant_dias', 8, 2);
            $table->decimal('gross', 8, 2);
            $table->decimal('neto', 8, 2);
            $table->decimal('comision_glc', 8, 2);
        
            $table->index('yates_id','fk_tarifario_yates1_idx');
        
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
        Schema::drop('tarifario');

    }
}
