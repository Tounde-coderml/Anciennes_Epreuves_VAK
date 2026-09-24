@extends('admin.layout')

@section('title', 'Années académiques')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Années académiques</h1>
            <p class="text-muted mb-0">Liste des années académiques du catalogue.</p>
        </div>
        <a href="{{ route('admin.annees-academiques.create') }}" class="btn btn-primary">+ Nouvelle année</a>
    </div>

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Libellé</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anneesAcademiques as $anneeAcademique)
                        <tr>
                            <td class="fw-semibold">{{ $anneeAcademique->libelle }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.annees-academiques.show', $anneeAcademique) }}" class="btn btn-outline-secondary btn-sm">Voir</a>
                                    <a href="{{ route('admin.annees-academiques.edit', $anneeAcademique) }}" class="btn btn-outline-primary btn-sm">Modifier</a>
                                    <form action="{{ route('admin.annees-academiques.destroy', $anneeAcademique) }}" method="POST" onsubmit="return confirm('Supprimer cette année académique ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-4">Aucune année académique pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
