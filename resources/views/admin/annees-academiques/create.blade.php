@extends('admin.layout')

@section('title', 'Créer une année académique')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Nouvelle année académique</h1>
            <p class="text-muted mb-0">Ajouter une année au catalogue ESGC VAK.</p>
        </div>
        <a href="{{ route('admin.annees-academiques.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.annees-academiques.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" name="libelle" id="libelle" class="form-control" value="{{ old('libelle') }}" placeholder="Ex. 2023-2024" required>
                @error('libelle')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('admin.annees-academiques.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
