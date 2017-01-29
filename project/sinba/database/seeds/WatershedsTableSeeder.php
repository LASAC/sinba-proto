<?php

use Illuminate\Database\Seeder;

class WatershedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::debug('WatershedsTableSeeder::run - starting');
        try{
            DB::table('watersheds')->insert([
                'name' => 'Bacia do Guariroba',
                'description' => 'A bacia do Córrego Guariroba possui extensão de aproximadamente 37.000 ha e situa-se entre os paralelos 20º29\'30”(N), 20º46\'05”(S) e meridianos 54º19\'39”(L) e 54º28\'30”(O), com altitude variando de 440 m a 640 m. Está localizada na grande unidade geológica denominada Bacia Sedimentar do Paraná e encontra-se inserida na sub-bacia hidrográfica do Rio Pardo. De acordo com o projeto RADAMBRASIL (BRASIL, 1982), a bacia hidrográfica do Guariroba encontra-se geomorfologicamente inserida no Planalto de Maracaju -Campo Grande, possuindo superfície de aplanamento, elaborada por processos de pediplanação, cortando litologias pré-cambrianas do Grupo Cuiabá e Corumbá, rochas devonianas e permocarboníferas da Bacia Sedimentar do Paraná. Os relevos de topo convexo, com diferentes ordens de grandeza e de aprofundamento de drenagem, são separados por vales de fundo plano ou em forma de “V” (ALVES SOBRINHO, 2010).'
            ]);
        } catch(Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        Log::debug('WatershedsTableSeeder::run - finished');
    }
}
