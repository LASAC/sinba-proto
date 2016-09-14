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
        DB::table('users')->insert([
            'name' => 'Geraldo',
            'lastName' => 'B. Landre',
            'birthDate' => '02/11/1988',
            'cpf' => '12345678901',
            'rg' => '001112233',
            'address' => 'Rua 0, 00.',
            'phone' => '(99)9999-9999',
            'cellphone' => '(99)9999-9999',
            'email' => 'geraldo.landre@gmail.com',
            'occupation' => 'Professor',
            'institution' => 'UFMS',
            'justification' => 'Eu gostaria de compartilhar meus dados com outros pesquisadores.',
            'password' => bcrypt('123456'),
            'isAdmin' => true
        ]);

        DB::table('users')->insert([
            'name' => 'Marília',
            'lastName' => 'C. Kameya',
            'birthDate' => '13/01/1986',
            'cpf' => '12345678902',
            'rg' => '001112234',
            'address' => 'Rua 0, 00.',
            'phone' => '(99)9999-9999',
            'cellphone' => '(99)9999-9999',
            'email' => 'mariliack@hotmail.com',
            'occupation' => 'Engenheira Ambiental',
            'institution' => 'UFMS',
            'justification' => 'Eu gostaria de compartilhar meus dados com outros pesquisadores.',
            'password' => bcrypt('123456'),
            'isAdmin' => true
        ]);
    }
}
