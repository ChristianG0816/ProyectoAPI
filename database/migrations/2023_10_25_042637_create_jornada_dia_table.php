<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornadaDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornada_dia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jornada')->constrained('jornada')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('id_dia')->constrained('dia')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('jornada_dia');
    }
}
