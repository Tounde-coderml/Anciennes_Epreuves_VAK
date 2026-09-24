@extends('admin.layout')

@section('title', 'Modifier une épreuve')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Modifier l’épreuve</h1>
            <p class="text-muted mb-0">Mise à jour du document {{ $epreuve->titre }}.</p>
        </div>
        <a href="{{ route('admin.epreuves.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.epreuves.update', $epreuve) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $epreuve->titre) }}" required>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="matiere_id" class="form-label">Matière</label>
                    <select name="matiere_id" id="matiere_id" class="form-select" required>
                        <option value="">Choisir une matière</option>
                        @foreach ($matieres as $matiere)
                            <option value="{{ $matiere->id }}" {{ old('matiere_id', $epreuve->matiere_id) == $matiere->id ? 'selected' : '' }}>
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
                            <option value="{{ $annee->id }}" {{ old('annee_academique_id', $epreuve->annee_academique_id) == $annee->id ? 'selected' : '' }}>
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
                        <option value="examen" {{ old('type', $epreuve->type) === 'examen' ? 'selected' : '' }}>Examen</option>
                        <option value="rattrapage" {{ old('type', $epreuve->type) === 'rattrapage' ? 'selected' : '' }}>Rattrapage</option>
                        <option value="devoir" {{ old('type', $epreuve->type) === 'devoir' ? 'selected' : '' }}>Devoir</option>
                        <option value="cc" {{ old('type', $epreuve->type) === 'cc' ? 'selected' : '' }}>CC</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="semestre" class="form-label">Semestre</label>
                    <input type="number" name="semestre" id="semestre" min="1" max="2" class="form-control" value="{{ old('semestre', $epreuve->semestre) }}" required>
                </div>
            </div>

            <div class="mt-3">
                <label for="fichier" class="form-label">Nouveau fichier PDF</label>
                <input type="file" name="fichier" id="fichier" class="form-control" accept="application/pdf">
                @if ($epreuve->fichier_path)
                    <div class="small text-muted mt-2">Fichier actuel : {{ basename($epreuve->fichier_path) }}</div>
                @endif
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('admin.epreuves.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
