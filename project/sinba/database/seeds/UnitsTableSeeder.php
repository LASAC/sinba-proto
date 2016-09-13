<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'name' => 'Metros',
            'symbol' => 'm'
        ]);
        DB::table('units')->insert([
            'name' => 'Quilômetros',
            'symbol' => 'km'
        ]);
        DB::table('units')->insert([
            'name' => 'Segundos',
            'symbol' => 's'
        ]);
        DB::table('units')->insert([
            'name' => 'Horas',
            'symbol' => null
        ]);
        DB::table('units')->insert([
            'name' => 'Metros por Segundo',
            'symbol' => 'm/s'
        ]);
        DB::table('units')->insert([
            'name' => 'Quilômetros por Hora',
            'symbol' => 'km/h'
        ]);
    }
}
