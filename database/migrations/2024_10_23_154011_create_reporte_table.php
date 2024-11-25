<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteTable extends Migration
{
    public function up()
    {
        Schema::create('reporte', function (Blueprint $table) {
            $table->id('ID_Reporte');
            $table->string('Tipo_Reporte');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Fin');
            $table->unsignedBigInteger('ID_Medicamento');
            $table->timestamps();

            $table->foreign('ID_Medicamento')->references('ID_Medicamento')->on('medicamento')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reporte');
    }
}
