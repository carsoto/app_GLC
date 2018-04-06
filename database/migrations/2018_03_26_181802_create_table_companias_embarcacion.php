<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompaniasEmbarcacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companias_embarcacion', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->string('razon_social', 80);
            $table->string('ruc', 100);
            $table->string('direccion', 250);
            $table->string('telefono_1', 45);
            $table->string('telefono_2', 45)->nullable();
            $table->string('banco', 100);
            $table->string('cuenta_bancaria', 100);
            $table->string('acuerdo_comercial', 250);
        
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
        Schema::drop('companias_embarcacion');

    }
}
