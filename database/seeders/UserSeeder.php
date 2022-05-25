<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = [
            'name' => 'João',
            'email' => 'joao@email.com',
            'password' => bcrypt('12345678'),

            'cpf' => '00000000000',
            'matricula' => '1111111',
            'telefone' => '77999999999',
            'numero' => '007',
            'rua' => 'Rua dos Bobos',
            'bairro' => 'Alameda das Flores',
            'cep' => '45028706',
            'cidade' => 'Dourados',
            'setor' => 'Desenvolvimento'

        ];

        User::create($user);


    }
}
