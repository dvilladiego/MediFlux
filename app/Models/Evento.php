<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'titulo', 
        'nota', 
        'tipo', 
        'fecha_inicio', 
        'hora_inicio', 
        'fecha_fin', 
        'hora_fin', 
        'todo_el_dia'
    ];
}