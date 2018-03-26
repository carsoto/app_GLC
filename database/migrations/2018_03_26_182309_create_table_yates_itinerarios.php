<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableYatesItinerarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yates_itinerarios', function(Blueprint $table) {
            $table->engine = 'InnoDB';
        
            $table->integer('yates_id')->unsigned();
            $table->integer('itinerarios_id')->unsigned();
        
            $table->index('yates_id','fk_yates_itinerarios_yates1_idx');
            $table->index('itinerarios_id','fk_yates_itinerarios_itinerarios1_idx');
        
            $table->foreign('yates_id')
                ->references('id')->on('yates');
        
            $table->foreign('itinerarios_id')
                ->references('id')->on('itinerarios');
        
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
        Schema::drop('yates_itinerarios');

    }
}
