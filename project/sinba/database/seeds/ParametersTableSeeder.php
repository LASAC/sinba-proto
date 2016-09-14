<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameters')->insert([
            'name' => 'pH',
            'unit_id' => 1
        ]);
        DB::table('parameters')->insert([
            'name' => 'Temperatura da Água',
            'unit_id' => 21
        ]);
    }
}
