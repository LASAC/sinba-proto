 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Log::debug('CreateUnitsTable::up - starting');
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('symbol', 15)->nullable();
            $table->string('inBaseUnits', 63)->nullable();
            $table->string('inOtherUnits', 63)->nullable();
            $table->timestamps();
        });
        Log::debug('CreateUnitsTable::up - finished');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Log::debug('CreateUnitsTable::down - starting');
        Schema::drop('units');
        Log::debug('CreateUnitsTable::down - finished');
    }
}
