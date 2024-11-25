<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertaTable extends Migration
{
    public function up()
    {
        Schema::create('alerta', function (Blueprint $table) {
            $table->id('ID_Alerta');
            $table->unsignedBigInteger('ID_Medicamento');
            $table->string('Codigo');
            $table->integer('Dias_Restantes');
            $table->timestamps();

            $table->foreign('ID_Medicamento')->references('ID_Medicamento')->on('medicamento')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alerta');
    }
}
   