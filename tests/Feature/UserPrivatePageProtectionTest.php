<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserPrivatePageProtectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_active_project_details(): void
    {
        $project = Project::factory()->create(['is_active' => true]);

        $response = $this->get("/portfolio/{$project->id}");
        $response->assertStatus(200);
    }

    public function test_guest_cannot_view_inactive_project_details(): void
    {
        $project = Project::factory()->create(['is_active' => false]);

        $response = $this->get("/portfolio/{$project->id}");
        $response->assertStatus(404);
    }

    public function test_authenticated_user_can_view_active_project_details(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['is_active' => true]);

        $response = $this->actingAs($user)->get("/portfolio/{$project->id}");
        $response->assertStatus(200);
    }

    public function test_authenticated_user_cannot_view_inactive_project_details(): void
    {
        $user = User::factory()->create();
        $project = Project::factory()->create(['is_active' => false]);

        $response = $this->actingAs($user)->get("/portfolio/{$project->id}");
        $response->assertStatus(404);
    }

    public function test_guest_can_access_contact_page(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_access_contact_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/contact');
        $response->assertStatus(200);
    }

    public function test_guest_can_submit_contact_form(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Test message',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
    }

    public function test_authenticated_user_can_submit_contact_form(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/contact', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'message' => 'Test message',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
    }

    public function test_guest_can_submit_testimonial(): void
    {
        $response = $this->post('/testimonials', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'rating' => 5,
            'message' => 'Test testimonial',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
    }

    public function test_authenticated_user_can_submit_testimonial(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/testimonials', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'rating' => 5,
            'message' => 'Test testimonial',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
    }

    public function test_guest_can_switch_language(): void
    {
        $response = $this->post('/language', [
            'locale' => 'ar',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }

    public function test_authenticated_user_can_switch_language(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/language', [
            'locale' => 'ar',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
    }

    public function test_language_switch_only_accepts_valid_locales(): void
    {
        $response = $this->post('/language', [
            'locale' => 'fr',
        ]);

        $response->assertSessionHasErrors();
    }

    public function test_guest_can_access_about_page(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_access_about_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/about');
        $response->assertStatus(200);
    }

    public function test_guest_can_access_services_page(): void
    {
        $response = $this->get('/services');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_access_services_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/services');
        $response->assertStatus(200);
    }

    public function test_guest_can_access_pricing_page(): void
    {
        $response = $this->get('/pricing');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_access_pricing_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/pricing');
        $response->assertStatus(200);
    }

    public function test_guest_can_access_portfolio_page(): void
    {
        $response = $this->get('/portfolio');
        $response->assertStatus(200);
    }

    public function test_authenticated_user_can_access_portfolio_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/portfolio');
        $response->assertStatus(200);
    }

    public function test_user_can_only_delete_own_account(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $response = $this->actingAs($user1)->delete('/profile', [
            'password' => 'password',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
        $this->assertNull($user1->fresh());
        $this->assertNotNull($user2->fresh());
    }

    public function test_user_can_only_update_own_profile(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $response = $this->actingAs($user1)->patch('/profile', [
            'name' => 'Updated Name',
            'email' => $user2->email,
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertEquals($user1->name, $user1->fresh()->name);
    }
}
