<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePasajeros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajeros', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->integer('charters_id')->unsigned();
            $table->string('nombre', 100);
            $table->integer('edad');
            $table->string('condicion_medica', 150)->default(null);
            $table->string('contacto_emergencia', 45);
            $table->string('parentesco_contacto', 45);
            
            $table->index(['charters_id'],'fk_pasajeros_charters1');
            $table->foreign('charters_id')->references('id')->on('charters');

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
        Schema::drop('pasajeros');

    }
}
