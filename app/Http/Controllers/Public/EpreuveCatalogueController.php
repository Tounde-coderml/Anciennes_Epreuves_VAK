<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Epreuve;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class EpreuveCatalogueController extends Controller
{
    public function index(Request $request): View
    {
        $query = Epreuve::query()->with(['matiere.filiere', 'anneeAcademique', 'deposePar']);

        if ($request->filled('filiere_id')) {
            $query->whereHas('matiere', function (Builder $builder) use ($request): void {
                $builder->where('filiere_id', $request->input('filiere_id'));
            });
        }

        if ($request->filled('matiere_id')) {
            $query->where('matiere_id', $request->input('matiere_id'));
        }

        if ($request->filled('annee_academique_id')) {
            $query->where('annee_academique_id', $request->input('annee_academique_id'));
        }

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('semestre')) {
            $query->where('semestre', $request->input('semestre'));
        }

        if ($request->filled('niveau') && Schema::hasColumn('matieres', 'niveau')) {
            $query->whereHas('matiere', function (Builder $builder) use ($request): void {
                $builder->where('niveau', $request->input('niveau'));
            });
        }

        $epreuves = $query->latest()->paginate(12)->appends($request->query());

        return view('public.epreuves.catalog', compact('epreuves'));
    }
}
