<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id('ID_Stock');
            $table->unsignedBigInteger('ID_Medicamento');
            $table->integer('Cantidad_Disponible');
            $table->integer('Cantidad_Minima_Requerida');
            $table->timestamps();

            $table->foreign('ID_Medicamento')->references('ID_Medicamento')->on('medicamento')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists ('stock');
    }
}
