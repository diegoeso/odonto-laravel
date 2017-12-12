<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasiente extends Model
{
     protected $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'malestares', 'id_odontologo', 'id_tratamiento',
    ];
}
