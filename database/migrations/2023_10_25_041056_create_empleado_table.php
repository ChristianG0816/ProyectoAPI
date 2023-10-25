<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 7);
            $table->string('primer_nombre', 50);
            $table->string('segundo_nombre', 50);
            $table->string('primer_apellido', 50);
            $table->string('segundo_apellido', 50);
            $table->string('apellido_casada', 50)->nullable();
            $table->date('fecha_nacimiento');
            $table->string('telefono', 8);
            $table->string('direccion', 255);
            $table->date('fecha_ingreso');
            $table->string('numero_cuenta', 20);
            $table->string('tipo_cuenta', 50);
            $table->string('nacionalidad', 50);
            $table->string('estado_civil', 50);
            $table->string('sexo', 50);
            $table->foreignId('id_banco')->constrained('banco')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_municipio')->constrained('municipio')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('empleado');
    }
}
