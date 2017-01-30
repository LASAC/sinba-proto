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
        Log::debug('UnitsTableSeeder::run - starting');
        try {
            DB::table('units')->insert([
                'name' => 'radiano',
                'symbol' => 'rad',
                'inOtherUnits' => '1',
                'inBaseUnits' => 'm/m'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'esferorradiano',
                'symbol' => 'sr',
                'inOtherUnits' => '1',
                'inBaseUnits' => 'm²/m²'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'katal',
                'symbol' => 'kat',
                'inBaseUnits' => 'mol/s'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'becquerel',
                'symbol' => 'Bq',
                'inBaseUnits' => '1/s'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('units')->insert([
                'name' => 'farad',
                'symbol' => 'F',
                'inBaseUnits' => 'A²·s²·s²/(kg·m²)',
                'inOtherUnits' => 'A·s/V'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'coulomb',
                'symbol' => 'C',
                'inBaseUnits' => 'A·s'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'siemens',
                'symbol' => 'S',
                'inBaseUnits' => 'A²·s³/(kg·m²)',
                'inOtherUnits' => 'A/V'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'gray',
                'symbol' => 'Gy',
                'inBaseUnits' => 'm²/s²',
                'inOtherUnits' => 'J/kg'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'sievert',
                'symbol' => 'Sv',
                'inBaseUnits' => 'm²/s²',
                'inOtherUnits' => 'J/kg'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'joule',
                'symbol' => 'J',
                'inBaseUnits' => 'kg·m²/s²',
                'inOtherUnits' => 'N·m'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'lúmen',
                'symbol' => 'lm',
                'inBaseUnits' => 'cd',
                'inOtherUnits' => 'cd·sr'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'weber',
                'symbol' => 'Wb',
                'inBaseUnits' => 'kg·m²/(s²·A)',
                'inOtherUnits' => 'V·s'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'newton',
                'symbol' => 'N',
                'inBaseUnits' => 'kg·m/s²'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'hertz',
                'symbol' => 'Hz',
                'inBaseUnits' => '1/s'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'henry',
                'symbol' => 'H',
                'inBaseUnits' => 'kg·m²/(s²·A²)',
                'inOtherUnits' => 'Wb/A'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'tesla',
                'symbol' => 'T',
                'inBaseUnits' => 'kg/(s²·A)',
                'inOtherUnits' => 'Wb/m²'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'lux',
                'symbol' => 'lx',
                'inBaseUnits' => 'cd/m²',
                'inOtherUnits' => 'lm/m²'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'watt',
                'symbol' => 'W',
                'inBaseUnits' => 'kg·m²/s³',
                'inOtherUnits' => 'J/s'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'pascal',
                'symbol' => 'Pa',
                'inBaseUnits' => 'kg/(m·s²)',
                'inOtherUnits' => 'N/m²'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'ohm',
                'symbol' => 'Ω',
                'inBaseUnits' => 'kg·m²/(s³·A²)',
                'inOtherUnits' => 'V/A'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'Grau Celsius',
                'symbol' => '°C'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        try {
            DB::table('units')->insert([
                'name' => 'volt',
                'symbol' => 'V',
                'inBaseUnits' => 'kg·m²/(s³·A)',
                'inOtherUnits' => 'W/A'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        Log::debug('UnitsTableSeeder::run - finished');
    }
}
