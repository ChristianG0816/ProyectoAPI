<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoDocumento;

class SeederTablaTipoDocumento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumento::create(['nombre' => 'DUI', 'mascara' => '99999999-9']);
        TipoDocumento::create(['nombre' => 'NIT', 'mascara' => '9999-999999-999-9']);
        TipoDocumento::create(['nombre' => 'Pasaporte', 'mascara' => 'AA999999']);
        TipoDocumento::create(['nombre' => 'Carnet de Residencia', 'mascara' => '9999999999999']);
        TipoDocumento::create(['nombre' => 'Carnet de Estudiante', 'mascara' => '9999999999999']);
        TipoDocumento::create(['nombre' => 'Licencia de Conducir', 'mascara' => '9999999999999']);
        TipoDocumento::create(['nombre' => 'Otro', 'mascara' => '9999999999999']);
    }
}
