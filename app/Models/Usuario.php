<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'ID_usuario';

    protected $fillable = [
        'Nombre_Usuario',
        'password',
        'Rol',
    ];

    protected $hidden = ['password'];
}
