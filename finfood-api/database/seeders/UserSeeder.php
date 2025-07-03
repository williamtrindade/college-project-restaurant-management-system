<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Importar o model User
use Illuminate\Support\Facades\Hash; // Importar o Facade Hash

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Utiliza o método 'firstOrCreate' para evitar duplicatas
        User::firstOrCreate(
            [
                // Atributo para buscar o usuário (deve ser único)
                'email' => 'admin@exemplo.com'
            ],
            [
                // Atributos para criar o usuário, caso não seja encontrado
                'name' => 'Administrador',
                'password' => Hash::make('password'), // Senha é 'password'
            ]
        );

        // Você pode adicionar mais usuários aqui, se necessário
        // User::firstOrCreate([...]);
    }
}
