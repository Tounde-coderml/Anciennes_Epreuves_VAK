@extends('admin.layout')

@section('title', 'Détail de l’épreuve')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Détail de l’épreuve</h1>
            <p class="text-muted mb-0">Informations de {{ $epreuve->titre }}.</p>
        </div>
        <a href="{{ route('admin.epreuves.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <dl class="row mb-0">
            <dt class="col-sm-3">Titre</dt>
            <dd class="col-sm-9">{{ $epreuve->titre }}</dd>

            <dt class="col-sm-3">Type</dt>
            <dd class="col-sm-9">{{ $epreuve->type }}</dd>

            <dt class="col-sm-3">Semestre</dt>
            <dd class="col-sm-9">{{ $epreuve->semestre }}</dd>

            <dt class="col-sm-3">Année académique</dt>
            <dd class="col-sm-9">{{ $epreuve->anneeAcademique?->libelle ?? '—' }}</dd>

            <dt class="col-sm-3">Matière</dt>
            <dd class="col-sm-9">{{ $epreuve->matiere?->nom ?? '—' }}</dd>

            <dt class="col-sm-3">Téléchargé</dt>
            <dd class="col-sm-9">{{ $epreuve->telechargements }} fois</dd>

            @if ($epreuve->fichier_path)
                <dt class="col-sm-3">Fichier</dt>
                <dd class="col-sm-9">
                    <a href="{{ $epreuve->url_fichier }}" target="_blank" class="btn btn-outline-primary btn-sm">Ouvrir le PDF</a>
                </dd>
            @endif
        </dl>
    </div>
@endsection
