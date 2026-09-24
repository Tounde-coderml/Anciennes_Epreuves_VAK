@extends('admin.layout')

@section('title', 'Modifier une filière')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Modifier la filière</h1>
            <p class="text-muted mb-0">Mise à jour des informations de {{ $filiere->nom }}.</p>
        </div>
        <a href="{{ route('admin.filieres.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <form action="{{ route('admin.filieres.update', $filiere) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la filière</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $filiere->nom) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $filiere->description) }}</textarea>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('admin.filieres.index') }}" class="btn btn-outline-secondary">Annuler</a>
            </div>
        </form>
    </div>
@endsection
