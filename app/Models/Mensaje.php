<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mensaje extends Model
{
    protected $fillable = ['user_id', 'mensaje'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
