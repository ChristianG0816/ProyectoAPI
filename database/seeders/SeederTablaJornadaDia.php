<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JornadaDia;

class SeederTablaJornadaDia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JornadaDia::create(['id_jornada' => '1', 'id_dia' => '1']);
        JornadaDia::create(['id_jornada' => '1', 'id_dia' => '2']);
        JornadaDia::create(['id_jornada' => '1', 'id_dia' => '3']);
        JornadaDia::create(['id_jornada' => '1', 'id_dia' => '4']);
        JornadaDia::create(['id_jornada' => '1', 'id_dia' => '5']);
        JornadaDia::create(['id_jornada' => '2', 'id_dia' => '1']);
        JornadaDia::create(['id_jornada' => '2', 'id_dia' => '2']);
        JornadaDia::create(['id_jornada' => '2', 'id_dia' => '3']);
        JornadaDia::create(['id_jornada' => '2', 'id_dia' => '4']);
        JornadaDia::create(['id_jornada' => '2', 'id_dia' => '5']);
    }
}
