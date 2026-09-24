@extends('admin.layout')

@section('title', 'Détail de la filière')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">{{ $filiere->nom }}</h1>
            <p class="text-muted mb-0">Slug : <span class="badge bg-light text-dark">{{ $filiere->slug }}</span></p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.filieres.edit', $filiere) }}" class="btn btn-primary">Modifier</a>
            <a href="{{ route('admin.filieres.index') }}" class="btn btn-outline-secondary">Retour</a>
        </div>
    </div>

    <div class="card p-4">
        <p class="mb-0"><strong>Description :</strong></p>
        <p class="mt-2 mb-0 text-muted">
            {{ $filiere->description ?: 'Aucune description n’a été renseignée.' }}
        </p>
    </div>
@endsection
