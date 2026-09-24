<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Epreuve extends Model
{
    protected $fillable = ['titre', 'matiere_id', 'annee_academique_id', 'type', 'semestre', 'fichier_path'];

    protected $appends = ['url_fichier'];

    public function matiere(): BelongsTo
    {
        return $this->belongsTo(Matiere::class);
    }

    public function anneeAcademique(): BelongsTo
    {
        return $this->belongsTo(AnneeAcademique::class);
    }

    public function deposePar(): BelongsTo
    {
        return $this->belongsTo(User::class, 'depose_par');
    }

    public function getUrlFichierAttribute(): ?string
    {
        if (! $this->fichier_path) {
            return null;
        }

        return Storage::url($this->fichier_path);
    }
}
