<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get('/forgot-password');

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->post('/forgot-password', ['email' => $user->email]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->post('/forgot-password', ['email' => $user->email]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        // Public auth routes are disabled, password reset is not available
        Notification::fake();

        $user = User::factory()->create();

        $response = $this->post('/forgot-password', ['email' => $user->email]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }
}
