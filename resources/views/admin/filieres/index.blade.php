@extends('admin.layout')

@section('title', 'Gestion des filières')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1">Filières</h1>
            <p class="text-muted mb-0">Liste des filières et matières associées.</p>
        </div>
        <a href="{{ route('admin.filieres.create') }}" class="btn btn-primary">+ Nouvelle filière</a>
    </div>

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Matières</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($filieres as $filiere)
                        <tr>
                            <td class="fw-semibold">{{ $filiere->nom }}</td>
                            <td><span class="badge bg-light text-dark">{{ $filiere->slug }}</span></td>
                            <td>{{ $filiere->description ?: '—' }}</td>
                            <td>{{ $filiere->matieres_count }}</td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.filieres.show', $filiere) }}" class="btn btn-outline-secondary btn-sm">Voir</a>
                                    <a href="{{ route('admin.filieres.edit', $filiere) }}" class="btn btn-outline-primary btn-sm">Modifier</a>
                                    <form action="{{ route('admin.filieres.destroy', $filiere) }}" method="POST" onsubmit="return confirm('Supprimer cette filière ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">Aucune filière pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
