<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'correo',
        'direccion',
        'celular',
        'clave'        
    ];

}
