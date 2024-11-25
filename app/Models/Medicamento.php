<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $table = 'medicamento';
    protected $primaryKey = 'ID_Medicamento';

    protected $fillable = [
        'Nombre',
        'Codigo',
        'Descripcion',
        'Cantidad',
        'Unidades',
        'Fecha_Vencimiento'
    ];

    // Relación uno a muchos con la tabla Stock
    public function stock()
    {
        return $this->hasOne(Stock::class, 'ID_Medicamento', 'ID_Medicamento');
    }

    // Relación uno a muchos con la tabla Alerta
    public function alertas()
    {
        return $this->hasMany(Alerta::class, 'ID_Medicamento', 'ID_Medicamento');
    }
}
