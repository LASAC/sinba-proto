<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Log::debug('CreateUsersTable::up - starting');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastName');
            $table->string('birthDate');
            $table->string('cpf')->unique();
            $table->string('rg');
            $table->string('address');
            $table->string('phone');
            $table->string('cellphone');
            $table->string('email')->unique();
            $table->string('occupation');
            $table->string('institution');
            $table->string('justification');
            $table->string('password');
            $table->boolean('isAdmin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
        Log::debug('CreateUsersTable::up - finished');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Log::debug('CreateUsersTable::down - starting');
        Schema::drop('users');
        Log::debug('CreateUsersTable::down - finished');
    }
}
