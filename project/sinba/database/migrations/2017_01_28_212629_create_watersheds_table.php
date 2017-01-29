<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatershedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Log::debug('CreateWatershedsTable::up - starting');
        Schema::create('watersheds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->text('description');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('watersheds');
        });
        Log::debug('CreateWatershedsTable::up - finished');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Log::debug('CreateWatershedsTable::down - starting');
        Schema::drop('watersheds');
        Log::debug('CreateWatershedsTable::down - finished');
    }
}
