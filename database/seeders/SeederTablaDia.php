<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dia;

class SeederTablaDia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dia::create(['nombre' => 'Lunes']);
        Dia::create(['nombre' => 'Martes']);
        Dia::create(['nombre' => 'Miércoles']);
        Dia::create(['nombre' => 'Jueves']);
        Dia::create(['nombre' => 'Viernes']);
        Dia::create(['nombre' => 'Sábado']);
        Dia::create(['nombre' => 'Domingo']);
    }
}
