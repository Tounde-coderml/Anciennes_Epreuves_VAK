@extends('admin.layout')

@section('title', 'Dashboard admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">Dashboard</h1>
            <p class="text-muted mb-0">Bienvenue sur l’espace administration ESGC VAK.</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger">Déconnexion</button>
        </form>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small text-uppercase">Utilisateurs</div>
                    <h3 class="mt-2 mb-0">1</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small text-uppercase">Filières</div>
                    <h3 class="mt-2 mb-0">{{ \App\Models\Filiere::count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="text-muted small text-uppercase">Accès</div>
                    <h3 class="mt-2 mb-0">Admin</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="{{ route('admin.filieres.index') }}" class="btn btn-primary">Voir les filières</a>
    </div>
@endsection
