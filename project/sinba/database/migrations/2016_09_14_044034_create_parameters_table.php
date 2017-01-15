<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Log::debug('CreateParametersTable::up - starting');
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->timestamps();
        });
        Log::debug('CreateParametersTable::up - finished');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Log::debug('CreateParametersTable::down - starting');
        Schema::drop('parameters');
        Log::debug('CreateParametersTable::down - finished');
    }
}
