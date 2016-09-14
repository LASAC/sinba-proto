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
            'quantity' => 'Ângulo plano',
            'name' => 'radiano',
            'symbol' => 'rad',
            'inOtherUnits' => '1',
            'inBaseUnits' => 'm/m'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Ângulo sólido',
            'name' => 'esferorradiano',
            'symbol' => 'sr',
            'inOtherUnits' => '1',
            'inBaseUnits' => 'm²/m²'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Atividade catalítica',
            'name' => 'katal',
            'symbol' => 'kat',
            'inBaseUnits' => 'mol/s'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Atividade radioativa',
            'name' => 'becquerel',
            'symbol' => 'Bq',
            'inBaseUnits' => '1/s'
        ]);


        DB::table('units')->insert([
            'quantity' => 'Capacitância',
            'name' => 'farad',
            'symbol' => 'F',
            'inBaseUnits' => 'A²·s²·s²/(kg·m²)',
            'inOtherUnits' => 'A·s/V'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Carga elétrica',
            'name' => 'coulomb',
            'symbol' => 'C',
            'inBaseUnits' => 'A·s'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Condutância',
            'name' => 'siemens',
            'symbol' => 'S',
            'inBaseUnits' => 'A²·s³/(kg·m²)',
            'inOtherUnits' => 'A/V'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Dose absorvida',
            'name' => 'gray',
            'symbol' => 'Gy',
            'inBaseUnits' => 'm²/s²',
            'inOtherUnits' => 'J/kg'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Dose equivalente',
            'name' => 'sievert',
            'symbol' => 'Sv',
            'inBaseUnits' => 'm²/s²',
            'inOtherUnits' => 'J/kg'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Energia',
            'name' => 'joule',
            'symbol' => 'J',
            'inBaseUnits' => 'kg·m²/s²',
            'inOtherUnits' => 'N·m'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Fluxo luminoso',
            'name' => 'lúmen',
            'symbol' => 'lm',
            'inBaseUnits' => 'cd',
            'inOtherUnits' => 'cd·sr'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Fluxo magnético',
            'name' => 'weber',
            'symbol' => 'Wb',
            'inBaseUnits' => 'kg·m²/(s²·A)',
            'inOtherUnits' => 'V·s'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Força',
            'name' => 'newton',
            'symbol' => 'N',
            'inBaseUnits' => 'kg·m/s²'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Freqüência',
            'name' => 'hertz',
            'symbol' => 'Hz',
            'inBaseUnits' => '1/s'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Indutância',
            'name' => 'henry',
            'symbol' => 'H',
            'inBaseUnits' => 'kg·m²/(s²·A²)',
            'inOtherUnits' => 'Wb/A'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Intensidade de campo magnético',
            'name' => 'tesla',
            'symbol' => 'T',
            'inBaseUnits' => 'kg/(s²·A)',
            'inOtherUnits' => 'Wb/m²'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Luminosidade',
            'name' => 'lux',
            'symbol' => 'lx',
            'inBaseUnits' => 'cd/m²',
            'inOtherUnits' => 'lm/m²'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Potência',
            'name' => 'watt',
            'symbol' => 'W',
            'inBaseUnits' => 'kg·m²/s³',
            'inOtherUnits' => 'J/s'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Pressão',
            'name' => 'pascal',
            'symbol' => 'Pa',
            'inBaseUnits' => 'kg/(m·s²)',
            'inOtherUnits' => 'N/m²'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Resistência elétrica',
            'name' => 'ohm',
            'symbol' => 'Ω',
            'inBaseUnits' => 'kg·m²/(s³·A²)',
            'inOtherUnits' => 'V/A'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Temperatura em Celsius',
            'name' => 'grau Celsius',
            'symbol' => '°C'
        ]);

        DB::table('units')->insert([
            'quantity' => 'Tensão elétrica',
            'name' => 'volt',
            'symbol' => 'V',
            'inBaseUnits' => 'kg·m²/(s³·A)',
            'inOtherUnits' => 'W/A'
        ]);
    }
}
