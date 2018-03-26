<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContactosCompaniaYate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactos_compania_yate', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->increments('id')->unsigned();
            $table->integer('compania_yate_id')->unsigned();
            $table->string('nombre', 100);
            $table->string('email', 150);
            $table->string('telefono', 45)->nullable();
        
            $table->index('compania_yate_id','fk_contacto_compania_yate_compania_yate1_idx');
        
            $table->foreign('compania_yate_id')
                ->references('id')->on('companias_yate');
        
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
        Schema::drop('contactos_compania_yate');

    }
}
