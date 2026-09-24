@extends('admin.layout')

@section('title', 'Créer une épreuve')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Nouvelle épreuve</h1>
            <p class="text-muted mb-0">Déposer un document PDF pour une matière et une année donnée.</p>
        </div>
        <a href="{{ route('admin.epreuves.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.epreuves.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="matiere_id" class="form-label">Matière</label>
                    <select name="matiere_id" id="matiere_id" class="form-select" required>
                        <option value="">Choisir une matière</option>
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" {{ old('matiere_id') == $matiere->id ? 'selected' : '' }}>
                                {{ $matiere->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="annee_academique_id" class="form-label">Année académique</label>
                    <select name="annee_academique_id" id="annee_academique_id" class="form-select" required>
                        <option value="">Choisir une année</option>
                        @foreach ($anneesAcademiques as $annee)
                            <option value="{{ $annee->id }}" {{ old('annee_academique_id') == $annee->id ? 'selected' : '' }}>
                                {{ $annee->libelle }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-3 mt-1">
                <div class="col-md-6">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-select" required>
                        <option value="">Choisir</option>
                        <option value="examen">Examen</option>
                        <option value="rattrapage">Rattrapage</option>
                        <option value="devoir">Devoir</option>
                        <option value="cc">CC</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="semestre" class="form-label">Semestre</label>
                    <input type="number" name="semestre" id="semestre" min="1" max="2" class="form-control" value="{{ old('semestre') }}" required>
                </div>
            </div>

            <div class="mt-3">
                <label for="fichier" class="form-label">Fichier PDF</label>
                <input type="file" name="fichier" id="fichier" class="form-control" accept="application/pdf" required>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('admin.epreuves.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
