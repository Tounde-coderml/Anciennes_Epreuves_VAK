<?php

namespace Database\Seeders;

use App\Models\AnneeAcademique;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@esgc-vak.com'],
            [
                'name' => 'Administrateur ESGC',
                'password' => Hash::make('Admin123!'),
                'is_admin' => true,
            ],
        );

        $filiere = Filiere::firstOrCreate(
            ['nom' => 'Informatique'],
            [
                'slug' => Str::slug('Informatique'),
                'description' => 'Formation en développement, systèmes et réseaux.',
            ],
        );

        Matiere::firstOrCreate(
            ['filiere_id' => $filiere->id, 'nom' => 'Programmation'],
            ['slug' => Str::slug('Programmation')],
        );

        Matiere::firstOrCreate(
            ['filiere_id' => $filiere->id, 'nom' => 'Base de données'],
            ['slug' => Str::slug('Base de données')],
        );

        Matiere::firstOrCreate(
            ['filiere_id' => $filiere->id, 'nom' => 'Réseaux'],
            ['slug' => Str::slug('Réseaux')],
        );

        AnneeAcademique::firstOrCreate(
            ['libelle' => '2024-2025'],
        );

        AnneeAcademique::firstOrCreate(
            ['libelle' => '2025-2026'],
        );
    }
}
