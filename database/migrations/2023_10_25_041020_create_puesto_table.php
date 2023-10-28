<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puesto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100); 
            $table->float('salario_mensual_base', 8, 2);
            $table->foreignId('id_unidad_organizativa')->constrained('unidad_organizativa')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('puesto');
    }
}
