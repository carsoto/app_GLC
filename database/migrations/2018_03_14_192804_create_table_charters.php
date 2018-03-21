<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCharters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charters', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('intermediarios_id')->unsigned();
            $table->string('codigo', 191);
            $table->string('cliente', 80);
            $table->string('tipo_charter', 120);
            $table->string('contrato', 255)->nullable();
            $table->float('costo', 8, 2)->nullable();

            $table->index('intermediarios_id','fk_charters_intermediarios1_idx');
        
            $table->foreign('intermediarios_id')->references('id')->on('intermediarios');
        
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
        Schema::drop('charters');

    }
}
