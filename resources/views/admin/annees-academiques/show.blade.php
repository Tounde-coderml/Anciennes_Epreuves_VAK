@extends('admin.layout')

@section('title', 'Détail de l’année académique')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Détail de l’année académique</h1>
            <p class="text-muted mb-0">Informations détaillées sur {{ $anneesAcademique->libelle }}.</p>
        </div>
        <a href="{{ route('admin.annees-academiques.index') }}" class="btn btn-outline-secondary">Retour</a>
    </div>

    <div class="card p-4">
        <dl class="row mb-0">
            <dt class="col-sm-3">Libellé</dt>
            <dd class="col-sm-9">{{ $anneesAcademique->libelle }}</dd>

            <dt class="col-sm-3">Créée le</dt>
            <dd class="col-sm-9">{{ $anneesAcademique->created_at?->format('d/m/Y H:i') ?? '—' }}</dd>

            <dt class="col-sm-3">Dernière modification</dt>
            <dd class="col-sm-9">{{ $anneesAcademique->updated_at?->format('d/m/Y H:i') ?? '—' }}</dd>
        </dl>
    </div>
@endsection
