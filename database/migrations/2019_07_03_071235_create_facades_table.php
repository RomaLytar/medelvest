<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',250);
            $table->string('price',250);
            $table->enum('type',['facade_selection', 'additional_components']);
            $table->integer('configuration_id')->unsigned();

            $table->foreign('configuration_id')->references('id')
                ->on('configurations');
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
        Schema::dropIfExists('facades');
    }
}
