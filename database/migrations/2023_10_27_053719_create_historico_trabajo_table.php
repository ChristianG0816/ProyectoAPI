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
            $table->unsignedBigInteger('id_empleado_puesto');
            $table->string('unidad', 100);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('dias_laborados');
            $table->string('turno', 100);
            $table->integer('horas_extra_normal');
            $table->integer('horas_dia_descanso');
            $table->integer('horas_dias_festivo');
            $table->integer('horas_normal');
            $table->double('salario_total');
            $table->timestamps();

            // Definición de la relación
            $table->foreign('id_empleado_puesto')
                  ->references('id')
                  ->on('empleado_puesto')
                  ->onDelete('cascade'); // Esto establece la acción en cascada si el empleado es eliminado
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
