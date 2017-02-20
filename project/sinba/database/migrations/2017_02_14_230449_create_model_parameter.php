<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelParameter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_parameter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_id')->unsigned()->nullable();
            $table->integer('parameter_id')->unsigned()->nullable();
            $table->string('label');
            $table->integer('sequence');

            $table->foreign('model_id')
                  ->references('id')->on('models')
                  ->onDelete('cascade');

            $table->foreign('parameter_id')
                  ->references('id')->on('parameters')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_parameter');
    }
}
