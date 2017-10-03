<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::debug('UsersTableSeeder::run - starting');
        try {
            DB::table('users')->insert([
                'name' => 'Geraldo',
                'lastName' => 'B. Landre',
                'birthDate' => '02/11/1988',
                'cpf' => '11111111111',
                'rg' => '001112233',
                'address' => 'Rua 0, 00.',
                'phone' => '6730000000',
                'cellphone' => '6799999999',
                'email' => 'geraldo.landre@gmail.com',
                'occupation' => 'Professor',
                'institution' => 'UFMS',
                'justification' => 'Eu gostaria de compartilhar meus dados com outros pesquisadores.',
                'password' => bcrypt('123456'),
                'isAdmin' => true
            ]);
        } catch (Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }

        try {
            DB::table('users')->insert([
                'name' => 'Marília',
                'lastName' => 'C. Kameya',
                'birthDate' => '13/01/1986',
                'cpf' => '22222222222',
                'rg' => '001112234',
                'address' => 'Rua 0, 00.',
                'phone' => '6730000000',
                'cellphone' => '6799999999',
                'email' => 'mariliack@hotmail.com',
                'occupation' => 'Engenheira Ambiental',
                'institution' => 'UFMS',
                'justification' => 'Eu gostaria de compartilhar meus dados com outros pesquisadores.',
                'password' => bcrypt('123456'),
                'isAdmin' => true
            ]);
        } catch (Exception $ex) {
            Log::debug('Exception:' . $ex->getMessage());
        }
        Log::debug('UsersTableSeeder::run - finished');
    }
}
