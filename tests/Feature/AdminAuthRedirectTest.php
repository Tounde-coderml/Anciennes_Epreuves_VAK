<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_user_can_login_and_redirect_to_dashboard(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin ESGC',
            'email' => 'admin@esgc-vak.com',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($admin);
    }
}
