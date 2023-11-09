<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class SeederTablaUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = User::create([
            'name'=> 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $administrador->assignRole('Administrador');

        $estrategico = User::create([
            'name'=> 'Marlon Paz',
            'email' => 'marlon@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $estrategico->assignRole('Gerente Recursos Humanos');

        $tactico = User::create([
            'name'=> 'Camila Pérez',
            'email' => 'camila@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $tactico->assignRole('Analista Recursos Humanos');

        
        $operativo = User::create([
            'name'=> 'Carmen Suarez',
            'email' => 'carmen@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        $operativo->assignRole('Jefe de Equipo');

    }
}
