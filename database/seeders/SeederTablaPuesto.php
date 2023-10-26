<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Puesto;

class SeederTablaPuesto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Puesto::create(['nombre' => 'Gerente', 'salario_mensual' => 1000, 'id_unidad_organizativa' => 1]);
        Puesto::create(['nombre' => 'Subgerente', 'salario_mensual' => 1000, 'id_unidad_organizativa' => 2]);
        Puesto::create(['nombre' => 'Jefe de Departamento', 'salario_mensual' => 1000, 'id_unidad_organizativa' => 3]);
        Puesto::create(['nombre' => 'Jefe de Departamento', 'salario_mensual' => 1000, 'id_unidad_organizativa' => 4]);
        Puesto::create(['nombre' => 'Jefe de Departamento', 'salario_mensual' => 1000, 'id_unidad_organizativa' => 5]);
    }
}
