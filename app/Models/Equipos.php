<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $fillable = ['nombre', 'estado', 'descripcion'];
}
