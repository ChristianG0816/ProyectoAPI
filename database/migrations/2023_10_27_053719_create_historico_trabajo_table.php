<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoTrabajoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_trabajo', function (Blueprint $table) {
            $table->id();
            $table->integer('id_empleado_puesto');
            $table->string('unidad', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('dias_laborados');
            $table->string('turno', 100);
            $table->time('horas_extra_normal');
            $table->time('horas_dia_descanso');
            $table->time('horas_dias_festivo');
            $table->time('horas_normal');
            $table->double('salario_total');
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
        Schema::dropIfExists('historico_trabajo');
    }
}
