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
            $table->string('codigo', 191);
            $table->string('cliente', 80);
            $table->integer('brokers_id')->unsigned();
            $table->string('tipo_charter', 120);
            $table->string('contrato', 255)->nullable()->default(null);
            $table->decimal('costo', 8, 2)->nullable()->default(null);
        
            $table->index('brokers_id','fk_charters_brokers1_idx');
        
            $table->foreign('brokers_id')
                ->references('id')->on('brokers');
        
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
