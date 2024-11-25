<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoTable extends Migration
{
    public function up()
    {
        Schema::create('medicamento', function (Blueprint $table) {
            $table->id('ID_Medicamento');
            $table->string('Nombre');
            $table->string('Codigo');
            $table->text('Descripcion')->nullable();
            $table->integer('Cantidad');
            $table->string('Unidades')->nullable();
            $table->date('Fecha_Vencimiento');
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicamento');
    }
}