<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class SeederTablaDepartamento extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['nombre' => 'Ahuachapán']);
        Departamento::create(['nombre' => 'Santa Ana']);
        Departamento::create(['nombre' => 'Sonsonate']);
        Departamento::create(['nombre' => 'Chalatenango']);
        Departamento::create(['nombre' => 'La Libertad']);
        Departamento::create(['nombre' => 'San Salvador']);
        Departamento::create(['nombre' => 'Cuscatlán']);
        Departamento::create(['nombre' => 'La Paz']);
        Departamento::create(['nombre' => 'Cabañas']);
        Departamento::create(['nombre' => 'San Vicente']);
        Departamento::create(['nombre' => 'Usulután']);
        Departamento::create(['nombre' => 'San Miguel']);
        Departamento::create(['nombre' => 'Morazán']);
        Departamento::create(['nombre' => 'La Unión']);
    }
}
