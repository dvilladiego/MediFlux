<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $table = 'alerta';
    protected $primaryKey = 'ID_Alerta';

    protected $fillable = [
        'ID_Medicamento',
        'Dias_Restantes',
        'Codigo',
    ];

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'ID_Medicamento', 'ID_Medicamento');
    }
}
