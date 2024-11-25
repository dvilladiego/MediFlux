<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = 'reporte';
    protected $primaryKey = 'ID_Reporte';

    protected $fillable = [
        'Tipo_Reporte',
        'Fecha_Inicio',
        'Fecha_Fin',
        'ID_Medicamento',
    ];
}
