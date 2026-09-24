<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEpreuveRequest;
use App\Http\Requests\UpdateEpreuveRequest;
use App\Models\AnneeAcademique;
use App\Models\Epreuve;
use App\Models\Matiere;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EpreuveController extends Controller
{
    public function index(): View
    {
        $epreuves = Epreuve::with(['matiere', 'anneeAcademique', 'deposePar'])
            ->latest()
            ->get();

        return view('admin.epreuves.index', compact('epreuves'));
    }

    public function create(): View
    {
        $matieres = Matiere::orderBy('nom')->get();
        $anneesAcademiques = AnneeAcademique::orderByDesc('libelle')->get();

        return view('admin.epreuves.create', compact('matieres', 'anneesAcademiques'));
    }

    public function store(StoreEpreuveRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('fichier')) {
            $validated['fichier_path'] = $request->file('fichier')->store('epreuves', 'public');
        }

        $validated['depose_par'] = auth()->id();

        Epreuve::create($validated);

        return redirect()->route('admin.epreuves.index')
            ->with('success', 'Épreuve ajoutée avec succès.');
    }

    public function show(Epreuve $epreuve): View
    {
        return view('admin.epreuves.show', compact('epreuve'));
    }

    public function edit(Epreuve $epreuve): View
    {
        $matieres = Matiere::orderBy('nom')->get();
        $anneesAcademiques = AnneeAcademique::orderByDesc('libelle')->get();

        return view('admin.epreuves.edit', compact('epreuve', 'matieres', 'anneesAcademiques'));
    }

    public function update(UpdateEpreuveRequest $request, Epreuve $epreuve): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('fichier')) {
            if ($epreuve->fichier_path && Storage::disk('public')->exists($epreuve->fichier_path)) {
                Storage::disk('public')->delete($epreuve->fichier_path);
            }

            $validated['fichier_path'] = $request->file('fichier')->store('epreuves', 'public');
        }

        $epreuve->update($validated);

        return redirect()->route('admin.epreuves.index')
            ->with('success', 'Épreuve modifiée avec succès.');
    }

    public function destroy(Epreuve $epreuve): RedirectResponse
    {
        if ($epreuve->fichier_path && Storage::disk('public')->exists($epreuve->fichier_path)) {
            Storage::disk('public')->delete($epreuve->fichier_path);
        }

        $epreuve->delete();

        return redirect()->route('admin.epreuves.index')
            ->with('success', 'Épreuve supprimée avec succès.');
    }
}
