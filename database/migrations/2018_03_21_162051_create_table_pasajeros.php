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
        
            $table->increments('id')->unsigned();
            $table->integer('tipo_charter_id')->unsigned();
            $table->string('nombre', 100);
            $table->integer('edad');
            $table->string('condicion_medica', 150);
            $table->string('contacto_emergencia', 45);
            $table->string('parentesco_contacto', 45);
        
            $table->index('tipo_charter_id','fk_pasajeros_tipo_charter1_idx');
        
            $table->foreign('tipo_charter_id')->references('id')->on('tipo_charter');
        
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
