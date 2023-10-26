<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnidadOrganizativa;

class SeederTablaUnidadOrganizativa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UnidadOrganizativa::create(['nombre' => 'Gerencia', 'id_unidad_padre' => null]);
        UnidadOrganizativa::create(['nombre' => 'Subgerencia', 'id_unidad_padre' => 1]);
        UnidadOrganizativa::create(['nombre' => 'Departamento de Recursos Humanos', 'id_unidad_padre' => 2]);
        UnidadOrganizativa::create(['nombre' => 'Departamento de Contabilidad', 'id_unidad_padre' => 2]);
        UnidadOrganizativa::create(['nombre' => 'Departamento de Informática', 'id_unidad_padre' => 2]);
    }
}
