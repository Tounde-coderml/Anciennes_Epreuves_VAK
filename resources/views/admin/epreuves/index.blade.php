@extends('admin.layout')

@section('title', 'Épreuves')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Épreuves</h1>
            <p class="text-muted mb-0">Gestion des examens, devoirs et autres épreuves.</p>
        </div>
        <a href="{{ route('admin.epreuves.create') }}" class="btn btn-primary">+ Nouvelle épreuve</a>
    </div>

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Semestre</th>
                        <th>Année</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($epreuves as $epreuve)
                        <tr>
                            <td class="fw-semibold">{{ $epreuve->titre }}</td>
                            <td><span class="badge bg-light text-dark">{{ $epreuve->type }}</span></td>
                            <td>{{ $epreuve->semestre }}</td>
                            <td>{{ $epreuve->anneeAcademique?->libelle ?? '—' }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.epreuves.show', $epreuve) }}" class="btn btn-outline-secondary btn-sm">Voir</a>
                                    <a href="{{ route('admin.epreuves.edit', $epreuve) }}" class="btn btn-outline-primary btn-sm">Modifier</a>
                                    <form action="{{ route('admin.epreuves.destroy', $epreuve) }}" method="POST" onsubmit="return confirm('Supprimer cette épreuve ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Aucune épreuve pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
