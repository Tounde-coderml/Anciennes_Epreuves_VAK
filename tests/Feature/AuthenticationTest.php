<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_register_and_access_their_profile(): void
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertCreated()
            ->assertJsonStructure(['message', 'user', 'token']);

        $token = $response->json('token');

        $this->withToken($token)
            ->getJson('/api/v1/auth/me')
            ->assertOk()
            ->assertJsonPath('email', 'jean@example.com');
    }

    public function test_registration_rejects_duplicate_email(): void
    {
        $this->postJson('/api/v1/auth/register', [
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->postJson('/api/v1/auth/register', [
            'name' => 'Autre utilisateur',
            'email' => 'jean@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertUnprocessable()->assertJsonValidationErrors('email');
    }

    public function test_profile_requires_authentication(): void
    {
        $this->getJson('/api/v1/auth/me')->assertUnauthorized();
    }

    public function test_a_user_can_login_and_logout(): void
    {
        $this->postJson('/api/v1/auth/register', [
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $loginResponse = $this->postJson('/api/v1/auth/login', [
            'email' => 'jean@example.com',
            'password' => 'password',
        ])->assertOk();

        $token = $loginResponse->json('token');

        $this->withToken($token)
            ->postJson('/api/v1/auth/logout')
            ->assertOk();

        $this->withToken($token)
            ->getJson('/api/v1/auth/me')
            ->assertUnauthorized();
    }

    public function test_login_rejects_invalid_credentials(): void
    {
        $this->postJson('/api/v1/auth/login', [
            'email' => 'unknown@example.com',
            'password' => 'password',
        ])->assertUnprocessable()->assertJsonPath('message', 'Les identifiants sont incorrects.');
    }
}
