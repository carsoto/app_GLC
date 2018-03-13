<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateChartersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->string('yate');
            $table->date('f_inicio');
            $table->date('f_fin');
            $table->integer('nro_pax');
            $table->string('intermediario');
            $table->string('deluxe');
            $table->float('tarifa');
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
