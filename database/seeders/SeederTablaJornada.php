<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jornada;

class SeederTablaJornada extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jornada::create(['hora_entrada' => '07:00:00', 'hora_salida' => '15:00:00']);
        Jornada::create(['hora_entrada' => '08:00:00', 'hora_salida' => '16:00:00']);
        Jornada::create(['hora_entrada' => '09:00:00', 'hora_salida' => '17:00:00']);
    }
}
