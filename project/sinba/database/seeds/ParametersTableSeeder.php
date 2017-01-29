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
        Log::debug('ParametersTableSeeder::run - starting');
        try {
            DB::table('parameters')->insert([
                'name' => 'Ângulo plano',
                'unit_id' => 1 // radiano
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Ângulo sólido',
                'unit_id' => 2 // esferorradiano
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Atividade catalítica',
                'unit_id' => 3 // katal
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Atividade radioativa',
                'unit_id' => 4 // becquerel
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Capacitância',
                'unit_id' => 5 // farad
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Carga elétrica',
                'unit_id' => 6 // coulomb
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Condutância',
                'unit_id' => 7 // siemens
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Dose absorvida',
                'unit_id' => 8 // gray
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Dose equivalente',
                'unit_id' => 9 // sievert
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Energia',
                'unit_id' => 10 // joule
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Fluxo luminoso',
                'unit_id' => 11 // lúmen
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Fluxo magnético',
                'unit_id' => 12 // weber
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Força',
                'unit_id' => 13 // newton
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Freqüência',
                'unit_id' => 14 // hertz
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Indutância',
                'unit_id' => 15 // henry
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Intensidade de campo magnético',
                'unit_id' => 16 // tesla
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Luminosidade',
                'unit_id' => 17 // lux
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Potência',
                'unit_id' => 18 // watt
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Pressão',
                'unit_id' => 19 // pascal
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Resistência elétrica',
                'unit_id' => 20 // ohm
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Temperatura',
                'unit_id' => 21 // celsius
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('parameters')->insert([
                'name' => 'Tensão elétrica',
                'unit_id' => 22 // volt
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        Log::debug('ParametersTableSeeder::run - finished');
    }
}
