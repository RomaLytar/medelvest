<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddItemToDimensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dimensions', function (Blueprint $table) {
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')
                ->on('sliding_doors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dimensions', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
        });
    }
}
