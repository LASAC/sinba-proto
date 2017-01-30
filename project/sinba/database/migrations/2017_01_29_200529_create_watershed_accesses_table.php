<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatershedAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Log::debug('CreateWatershedAccessesTable::up - starting');
        Schema::create('watershed_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')-> unsigned();
            $table->integer('watershed_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('watershed_id')->references('id')->on('watersheds');
        });
        Log::debug('CreateWatershedAccessesTable::up - finished');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Log::debug('CreateWatershedAccessesTable::down - starting');
        Schema::dropIfExists('watershed_accesses');
        Log::debug('CreateWatershedAccessesTable::down - finished');
    }
}
