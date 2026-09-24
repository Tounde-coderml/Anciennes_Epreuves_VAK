<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AnneeAcademique extends Model
{
    protected $table = 'annees_academiques';

    protected $fillable = ['libelle'];

    public function epreuves(): HasMany
    {
        return $this->hasMany(Epreuve::class);
    }
}
