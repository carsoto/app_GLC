<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableApa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apa', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id');
            $table->integer('charters_id')->unsigned();
            $table->integer('tipos_factura_id')->unsigned();
            $table->integer('actividades_id')->unsigned();
            $table->date('fecha_factura');
            $table->string('desc_factura', 255);
            $table->decimal('monto', 8, 2);
            $table->string('soporte', 255);
        
            $table->index('charters_id','fk_apa_charters1_idx');
            $table->index('tipos_factura_id','fk_apa_tipos_factura1_idx');
            $table->index('actividades_id','fk_apa_actividades1_idx');
        
            $table->foreign('charters_id')->references('id')->on('charters');
        
            $table->foreign('tipos_factura_id')->references('id')->on('tipos_factura');
        
            $table->foreign('actividades_id')->references('id')->on('actividades');
        
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
        Schema::drop('apa');
    }
}
