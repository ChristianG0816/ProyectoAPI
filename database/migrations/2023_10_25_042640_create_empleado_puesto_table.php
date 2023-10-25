<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoPuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_puesto', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->boolean('actual');
            $table->boolean('cambio_puesto');
            $table->foreignId('id_empleado')->constrained('empleado')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_puesto')->constrained('puesto')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_jornada')->constrained('jornada')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('empleado_puesto');
    }
}
