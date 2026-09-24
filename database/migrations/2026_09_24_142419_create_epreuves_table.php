<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('epreuves', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->foreignId('matiere_id')->constrained('matieres')->cascadeOnDelete();
            $table->foreignId('annee_academique_id')->constrained('annees_academiques')->cascadeOnDelete();
            $table->enum('type', ['examen', 'rattrapage', 'devoir', 'cc']);
            $table->tinyInteger('semestre')->unsigned();
            $table->string('fichier_path')->nullable();
            $table->foreignId('depose_par')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

            $table->index(['matiere_id', 'annee_academique_id', 'type'], 'epreuves_catalogue_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epreuves');
    }
};
