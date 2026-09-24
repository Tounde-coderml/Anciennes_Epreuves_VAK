<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Filiere extends Model
{
    protected $fillable = ['nom', 'slug', 'description'];

    public function matieres(): HasMany
    {
        return $this->hasMany(Matiere::class);
    }

    protected static function booted(): void
    {
        static::creating(function (self $filiere): void {
            $filiere->slug = $filiere->slug ?: Str::slug($filiere->nom);
        });

        static::updating(function (self $filiere): void {
            if ($filiere->isDirty('nom') && empty($filiere->slug)) {
                $filiere->slug = Str::slug($filiere->nom);
            }

            if ($filiere->isDirty('nom') && ! empty($filiere->slug)) {
                $filiere->slug = Str::slug($filiere->nom);
            }
        });
    }
}
