<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
 	protected $fillable = ['nombre','costo','tiempo','id_odontologo'];
}
