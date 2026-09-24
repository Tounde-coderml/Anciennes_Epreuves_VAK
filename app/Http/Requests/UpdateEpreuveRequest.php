<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEpreuveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titre' => ['sometimes', 'required', 'string', 'max:255'],
            'matiere_id' => ['sometimes', 'required', 'integer', 'exists:matieres,id'],
            'annee_academique_id' => ['sometimes', 'required', 'integer', 'exists:annees_academiques,id'],
            'type' => ['sometimes', 'required', 'string', 'in:examen,rattrapage,devoir,cc'],
            'semestre' => ['sometimes', 'required', 'integer', 'between:1,2'],
            'fichier' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ];
    }
}
