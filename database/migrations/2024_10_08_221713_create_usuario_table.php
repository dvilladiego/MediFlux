<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('ID_Usuario');
            $table->string('Nombre_Usuario');
            $table->string('password');  
            $table->enum('Rol', ['Administrador', 'Personal_de_enfermería', 'Personal_médico']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
