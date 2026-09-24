<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AnneeAcademiqueValidationTest extends TestCase
{
    public function test_libelle_requires_valid_academic_year_format(): void
    {
        $rules = [
            'libelle' => ['required', 'string', 'regex:/^\d{4}-\d{4}$/'],
        ];

        $validator = Validator::make([
            'libelle' => '2023-2024',
        ], $rules);

        $this->assertFalse($validator->fails());

        $invalidValidator = Validator::make([
            'libelle' => '2023',
        ], $rules);

        $this->assertTrue($invalidValidator->fails());
        $this->assertArrayHasKey('libelle', $invalidValidator->errors()->toArray());
    }
}
