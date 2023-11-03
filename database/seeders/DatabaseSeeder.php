<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this -> call([SeederTablaUsuarios::class]);
        $this -> call([SeederTablaDia::class]);
        $this -> call([SeederTablaBanco::class]);
        $this -> call([SeederTablaDepartamento::class]);
        $this -> call([SeederTablaMunicipio::class]);
        $this -> call([SeederTablaTipoDocumento::class]);
        $this -> call([SeederTablaJornada::class]);
        $this -> call([SeederTablaJornadaDia::class]);
        $this -> call([SeederTablaUnidadOrganizativa::class]);
        $this -> call([SeederTablaPuesto::class]);
        $this -> call([SeederTablaEmpleado::class]);
    }
}
