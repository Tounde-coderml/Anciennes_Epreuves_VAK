<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matiere extends Model
{
    protected $fillable = ['filiere_id', 'nom', 'slug'];

    public function filiere(): BelongsTo
    {
        return $this->belongsTo(Filiere::class);
    }
}
