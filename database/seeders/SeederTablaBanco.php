<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banco;

class SeederTablaBanco extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banco::create(['nombre' => 'Banco Agrícola']);
        Banco::create(['nombre' => 'Banco Cuscatlán']);
        Banco::create(['nombre' => 'Banco Davivienda']);
        Banco::create(['nombre' => 'Banco de América Central']);
    }
}
