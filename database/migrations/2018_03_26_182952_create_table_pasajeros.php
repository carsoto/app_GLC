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
        
            $table->integer('id')->unsigned();
            $table->integer('parentescos_id')->unsigned();
            $table->string('nombre', 100);
            $table->integer('edad');
            $table->string('condicion_medica', 150);
            $table->string('contacto_emergencia', 45);
            $table->integer('tipos_charter_id')->unsigned();
            
            $table->primary('id');
        
            $table->index('parentescos_id','fk_pasajeros_parentescos1_idx');
            $table->index('tipos_charter_id','fk_pasajeros_tipos_charter1_idx');
        
            $table->foreign('parentescos_id')
                ->references('id')->on('parentescos');
        
            $table->foreign('tipos_charter_id')
                ->references('id')->on('tipos_charter');
        
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
