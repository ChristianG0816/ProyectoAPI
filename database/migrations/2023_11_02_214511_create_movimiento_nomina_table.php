<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientoNominaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
    Schema::create('movimiento_nomina', function (Blueprint $table) {
        $table->id();
        $table->string('concepto', 255);
        $table->float('valor_pagar');
        $table->string('accion', 255);
        $table->string('observacion', 255);
        $table->date('fecha_movimiento');
        $table->foreignId('id_empleado')->constrained('empleado')->onDelete('restrict')->onUpdate('cascade');
        $table->foreignId('id_tipo_frecuencia')->constrained('tipo_frecuencia')->onDelete('restrict')->onUpdate('cascade');
        $table->foreignId('id_tipo_movimiento_nomina')->constrained('tipo_movimiento_nomina')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('movimiento_nomina');
    }
}
