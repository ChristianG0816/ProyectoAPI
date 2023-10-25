<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoEmpleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_empleado', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 100);
            $table->foreignId('id_tipo_documento')->constrained('tipo_documento')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_empleado')->constrained('empleado')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('documento_empleado');
    }
}
