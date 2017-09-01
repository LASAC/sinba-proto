<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');

            $table->string('value');

            $table->integer('watershed_id')->unsigned();
            $table->foreign('watershed_id')->references('id')->on('watersheds');

            $table->integer('parameter_id')->unsigned();
            $table->foreign('parameter_id')->references('id')->on('parameters');

            $table->string('latitude');
            $table->string('longitude');

            $table->string('sharing_type');

            // registered by:
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // TODO: collected by restringir a um conjunto pré-definido
            $table->string('collected_by');

            $table->timestamp('collected_at');

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
        Schema::dropIfExists('data');
    }
}
