@extends('admin.layout')

@section('title', 'Modifier une année académique')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Modifier l’année académique</h1>
            <p class="text-muted mb-0">Mise à jour du libellé de {{ $anneesAcademique->libelle }}.</p>
        </div>
        <a href="{{ route('admin.annees-academiques.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.annees-academiques.update', $anneesAcademique) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" name="libelle" id="libelle" class="form-control" value="{{ old('libelle', $anneesAcademique->libelle) }}" placeholder="Ex. 2023-2024" required>
                @error('libelle')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('admin.annees-academiques.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
