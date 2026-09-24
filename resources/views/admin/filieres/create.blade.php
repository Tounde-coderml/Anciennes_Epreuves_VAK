@extends('admin.layout')

@section('title', 'Créer une filière')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Nouvelle filière</h1>
            <p class="text-muted mb-0">Créer une filière pour l’ESGC VAK.</p>
        </div>
        <a href="{{ route('admin.filieres.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.filieres.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la filière</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" placeholder="Ex. Génie Civil" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Description de la filière">{{ old('description') }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
                <a href="{{ route('admin.filieres.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
