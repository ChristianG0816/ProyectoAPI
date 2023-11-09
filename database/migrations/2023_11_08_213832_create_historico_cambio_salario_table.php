<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoCambioSalarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_cambio_salario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('salario_nuevo');
            $table->float('salario_anterior');
            $table->date('fecha_cambio_salario');
            $table->foreignId('id_empleado_puesto')->constrained('empleado_puesto')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico_cambio_salario');
    }
}
