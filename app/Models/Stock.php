<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    protected $table = 'stock';
    protected $primaryKey = 'ID_Stock';

    protected $fillable = [
        'ID_Medicamento',
        'Cantidad_Disponible',
        'Cantidad_Minima_Requerida',
    ];

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'ID_Medicamento', 'ID_Medicamento');
    }
}

