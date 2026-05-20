<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipos extends Model
{
    protected $fillable = ['nombre', 'estado', 'descripcion', 'tecnico_id'];

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'tecnico_id');
    }

    public function mantenimientos(): HasMany
    {
        return $this->hasMany(Mantenimiento::class, 'equipo_id');
    }
}
