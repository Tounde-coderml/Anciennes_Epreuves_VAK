<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Epreuve;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class EpreuveController extends Controller
{
    public function show(Epreuve $epreuve): View
    {
        $epreuve->load(['matiere.filiere', 'anneeAcademique', 'deposePar']);

        return view('public.epreuves.show', compact('epreuve'));
    }

    public function download(Epreuve $epreuve): RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        if (! $epreuve->fichier_path || ! Storage::disk('public')->exists($epreuve->fichier_path)) {
            abort(404, 'Fichier introuvable.');
        }

        $epreuve->increment('telechargements');

        return response()->download(Storage::disk('public')->path($epreuve->fichier_path), basename($epreuve->fichier_path));
    }
}
