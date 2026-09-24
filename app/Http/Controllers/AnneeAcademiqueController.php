<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnneeAcademiqueRequest;
use App\Http\Requests\UpdateAnneeAcademiqueRequest;
use App\Models\AnneeAcademique;

class AnneeAcademiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anneesAcademiques = AnneeAcademique::latest()->get();

        return view('admin.annees-academiques.index', compact('anneesAcademiques'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.annees-academiques.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnneeAcademiqueRequest $request)
    {
        AnneeAcademique::create($request->validated());

        return redirect()->route('admin.annees-academiques.index')
            ->with('success', 'Année académique ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AnneeAcademique $anneesAcademique)
    {
        return view('admin.annees-academiques.show', compact('anneesAcademique'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnneeAcademique $anneesAcademique)
    {
        return view('admin.annees-academiques.edit', compact('anneesAcademique'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnneeAcademiqueRequest $request, AnneeAcademique $anneesAcademique)
    {
        $anneesAcademique->update($request->validated());

        return redirect()->route('admin.annees-academiques.index')
            ->with('success', 'Année académique modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnneeAcademique $anneesAcademique)
    {
        $anneesAcademique->delete();

        return redirect()->route('admin.annees-academiques.index')
            ->with('success', 'Année académique supprimée avec succès.');
    }
}
