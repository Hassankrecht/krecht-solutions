<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Service;
use App\Models\Project;
use App\Models\PricingPackage;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageNotification;
use Tests\TestCase;

class FormButtonTest extends TestCase
{
    use RefreshDatabase;

    // ==================== POST /language ====================

    public function test_language_switch_button_works(): void
    {
        $response = $this->post('/language', ['locale' => 'ar']);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertEquals('ar', session('locale'));
    }

    public function test_language_switch_to_english(): void
    {
        session(['locale' => 'ar']);

        $response = $this->post('/language', ['locale' => 'en']);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertEquals('en', session('locale'));
    }

    public function test_language_switch_validation_fails_for_invalid_locale(): void
    {
        $response = $this->post('/language', ['locale' => 'fr']);

        $response->assertSessionHasErrors('locale');
        $this->assertNull(session('locale'));
    }

    public function test_language_switch_validation_fails_without_locale(): void
    {
        $response = $this->post('/language', []);

        $response->assertSessionHasErrors('locale');
    }

    // ==================== POST /contact ====================

    public function test_contact_form_submission_works(): void
    {
        Mail::fake();

        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '+1234567890',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Your message has been sent successfully.');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Test Subject',
            'message' => 'This is a test message.',
        ]);

        Mail::assertSent(ContactMessageNotification::class);
    }

    public function test_contact_form_without_optional_fields(): void
    {
        Mail::fake();

        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => null,
            'subject' => null,
        ]);
    }

    public function test_contact_form_validation_fails_without_name(): void
    {
        $response = $this->post('/contact', [
            'email' => 'john@example.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertSessionHasErrors('name');
        $this->assertDatabaseMissing('contact_messages', [
            'email' => 'john@example.com',
        ]);
    }

    public function test_contact_form_validation_fails_without_email(): void
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'message' => 'This is a test message.',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_contact_form_validation_fails_with_invalid_email(): void
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'invalid-email',
            'message' => 'This is a test message.',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_contact_form_validation_fails_without_message(): void
    {
        $response = $this->post('/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertSessionHasErrors('message');
    }

    public function test_contact_form_validation_fails_with_too_long_name(): void
    {
        $response = $this->post('/contact', [
            'name' => str_repeat('A', 256),
            'email' => 'john@example.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertSessionHasErrors('name');
    }

    // ==================== POST /testimonials ====================

    public function test_testimonial_submission_works(): void
    {
        $response = $this->post('/testimonials', [
            'name' => 'Jane Doe',
            'position' => 'CEO',
            'company' => 'Test Company',
            'email' => 'jane@example.com',
            'rating' => 5,
            'message' => 'Great service!',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $response->assertSessionHas('testimonial_success', 'Thank you! Your testimonial has been submitted and is waiting for approval.');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'rating' => 5,
            'status' => 'pending',
            'is_active' => false,
        ]);
    }

    public function test_testimonial_submission_with_image(): void
    {
        $file = \Illuminate\Http\UploadedFile::fake()->image('testimonial.jpg', 400, 400);

        $response = $this->post('/testimonials', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'rating' => 5,
            'message' => 'Great service!',
            'image' => $file,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $response->assertSessionHas('testimonial_success');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
        ]);
    }

    public function test_testimonial_submission_validation_fails_without_name(): void
    {
        $response = $this->post('/testimonials', [
            'email' => 'jane@example.com',
            'rating' => 5,
            'message' => 'Great service!',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_testimonial_submission_validation_fails_without_email(): void
    {
        $response = $this->post('/testimonials', [
            'name' => 'Jane Doe',
            'rating' => 5,
            'message' => 'Great service!',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_testimonial_submission_validation_fails_without_rating(): void
    {
        $response = $this->post('/testimonials', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => 'Great service!',
        ]);

        $response->assertSessionHasErrors('rating');
    }

    public function test_testimonial_submission_validation_fails_without_message(): void
    {
        $response = $this->post('/testimonials', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'rating' => 5,
        ]);

        $response->assertSessionHasErrors('message');
    }

    public function test_testimonial_submission_validation_fails_with_invalid_rating(): void
    {
        $response = $this->post('/testimonials', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'rating' => 6,
            'message' => 'Great service!',
        ]);

        $response->assertSessionHasErrors('rating');
    }

    public function test_testimonial_submission_validation_fails_with_invalid_image(): void
    {
        $file = \Illuminate\Http\UploadedFile::fake()->create('document.pdf', 1000);

        $response = $this->post('/testimonials', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'rating' => 5,
            'message' => 'Great service!',
            'image' => $file,
        ]);

        $response->assertSessionHasErrors('image');
    }


    public function test_registration_form_works(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    public function test_login_form_works(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    public function test_logout_button_works(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }

    // ==================== PATCH /profile ====================

    public function test_profile_update_form_works(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch('/profile', [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/profile');
        $response->assertSessionHas('status', 'profile-updated');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    public function test_profile_update_email_verification_reset(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->patch('/profile', [
            'name' => 'Updated Name',
            'email' => 'newemail@example.com',
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertNull($user->fresh()->email_verified_at);
    }

    public function test_profile_update_validation_fails_without_name(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch('/profile', [
            'email' => 'updated@example.com',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_profile_update_validation_fails_without_email(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->patch('/profile', [
            'name' => 'Updated Name',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_profile_update_guest_cannot_access(): void
    {
        $response = $this->patch('/profile', [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

        $response->assertRedirect('/login');
    }

    // ==================== DELETE /profile ====================

    public function test_profile_delete_button_works(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->delete('/profile', [
            'password' => 'password',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_profile_delete_validation_fails_without_password(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete('/profile', []);

        $response->assertSessionHasErrors();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function test_profile_delete_validation_fails_with_wrong_password(): void
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->delete('/profile', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }

    public function test_profile_delete_guest_cannot_access(): void
    {
        $response = $this->delete('/profile', [
            'password' => 'password',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_password_update_form_works(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->put('/password', [
            'current_password' => 'password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    public function test_password_confirmation_form_works(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    // ==================== Admin - Services ====================

    public function test_admin_service_create_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/services', [
            'title_en' => 'Web Development',
            'icon' => 'code',
            'short_description_en' => 'Web services',
            'description_en' => 'Full web development services',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/services');
        $response->assertSessionHas('success', 'Service created successfully.');

        $this->assertDatabaseHas('services', [
            'title' => 'Web Development',
            'icon' => 'code',
        ]);
    }

    public function test_admin_service_create_validation_fails_without_title(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/services', [
            'icon' => 'code',
            'description_en' => 'Full web development services',
        ]);

        $response->assertSessionHasErrors('title_en');
    }

    public function test_admin_service_create_validation_fails_without_icon(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/services', [
            'title_en' => 'Web Development',
            'description_en' => 'Full web development services',
        ]);

        $response->assertSessionHasErrors('icon');
    }

    public function test_admin_service_create_validation_fails_without_description(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/services', [
            'title_en' => 'Web Development',
            'icon' => 'code',
        ]);

        $response->assertSessionHasErrors('description_en');
    }

    public function test_admin_service_create_guest_cannot_access(): void
    {
        $response = $this->post('/admin/services', [
            'title_en' => 'Web Development',
            'icon' => 'code',
            'description_en' => 'Full web development services',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_service_create_non_admin_cannot_access(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $response = $this->actingAs($user)->post('/admin/services', [
            'title_en' => 'Web Development',
            'icon' => 'code',
            'description_en' => 'Full web development services',
        ]);

        $response->assertStatus(403);
    }

    public function test_admin_service_update_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $service = Service::factory()->create();

        $response = $this->actingAs($admin)->put("/admin/services/{$service->id}", [
            'title_en' => 'Updated Service',
            'icon' => 'updated-icon',
            'description_en' => 'Updated description',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/services');
        $response->assertSessionHas('success', 'Service updated successfully.');

        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'title' => 'Updated Service',
        ]);
    }

    public function test_admin_service_update_validation_fails_without_title(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $service = Service::factory()->create();

        $response = $this->actingAs($admin)->put("/admin/services/{$service->id}", [
            'icon' => 'updated-icon',
            'description_en' => 'Updated description',
        ]);

        $response->assertSessionHasErrors('title_en');
    }

    public function test_admin_service_update_guest_cannot_access(): void
    {
        $service = Service::factory()->create();

        $response = $this->put("/admin/services/{$service->id}", [
            'title_en' => 'Updated Service',
            'icon' => 'updated-icon',
            'description_en' => 'Updated description',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_service_delete_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $service = Service::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/services/{$service->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/services');
        $response->assertSessionHas('success', 'Service deleted successfully.');

        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }

    public function test_admin_service_delete_guest_cannot_access(): void
    {
        $service = Service::factory()->create();

        $response = $this->delete("/admin/services/{$service->id}");

        $response->assertRedirect('/login');
    }

    // ==================== Admin - Projects ====================

    public function test_admin_project_create_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/projects', [
            'title_en' => 'Test Project',
            'category_en' => 'Web',
            'description_en' => 'Project description',
            'is_active' => true,
            'order' => 1,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/projects');
        $response->assertSessionHas('success', 'Project created successfully.');

        $this->assertDatabaseHas('projects', [
            'title' => 'Test Project',
            'category' => 'Web',
        ]);
    }

    public function test_admin_project_create_validation_fails_without_title(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/projects', [
            'category_en' => 'Web',
            'description_en' => 'Project description',
        ]);

        $response->assertSessionHasErrors('title_en');
    }

    public function test_admin_project_create_validation_fails_without_category(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/projects', [
            'title_en' => 'Test Project',
            'description_en' => 'Project description',
        ]);

        $response->assertSessionHasErrors('category_en');
    }

    public function test_admin_project_create_guest_cannot_access(): void
    {
        $response = $this->post('/admin/projects', [
            'title_en' => 'Test Project',
            'category_en' => 'Web',
            'description_en' => 'Project description',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_project_update_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $project = Project::factory()->create();

        $response = $this->actingAs($admin)->put("/admin/projects/{$project->id}", [
            'title_en' => 'Updated Project',
            'category_en' => 'Mobile',
            'description_en' => 'Updated description',
            'is_active' => true,
            'order' => 2,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/projects');
        $response->assertSessionHas('success', 'Project updated successfully.');

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'title' => 'Updated Project',
        ]);
    }

    public function test_admin_project_update_guest_cannot_access(): void
    {
        $project = Project::factory()->create();

        $response = $this->put("/admin/projects/{$project->id}", [
            'title_en' => 'Updated Project',
            'category_en' => 'Mobile',
            'description_en' => 'Updated description',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_project_delete_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $project = Project::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/projects/{$project->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/projects');
        $response->assertSessionHas('success', 'Project deleted successfully.');

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    public function test_admin_project_delete_guest_cannot_access(): void
    {
        $project = Project::factory()->create();

        $response = $this->delete("/admin/projects/{$project->id}");

        $response->assertRedirect('/login');
    }

    // ==================== Admin - Pricing Packages ====================

    public function test_admin_pricing_package_create_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/pricing-packages', [
            'name_en' => 'Basic Plan',
            'category_en' => 'Web',
            'price' => '99.99',
            'features_en' => "Feature 1\nFeature 2",
            'is_active' => true,
            'order' => 1,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/pricing-packages');
        $response->assertSessionHas('success', 'Pricing package created successfully.');

        $this->assertDatabaseHas('pricing_packages', [
            'name' => 'Basic Plan',
            'price' => '99.99',
        ]);
    }

    public function test_admin_pricing_package_create_validation_fails_without_name(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/pricing-packages', [
            'category_en' => 'Web',
            'price' => '99.99',
        ]);

        $response->assertSessionHasErrors('name_en');
    }

    public function test_admin_pricing_package_create_validation_fails_without_price(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/pricing-packages', [
            'name_en' => 'Basic Plan',
            'category_en' => 'Web',
        ]);

        $response->assertSessionHasErrors('price');
    }

    public function test_admin_pricing_package_create_validation_fails_without_category(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/pricing-packages', [
            'name_en' => 'Basic Plan',
            'price' => '99.99',
        ]);

        $response->assertSessionHasErrors('category_en');
    }

    public function test_admin_pricing_package_create_guest_cannot_access(): void
    {
        $response = $this->post('/admin/pricing-packages', [
            'name_en' => 'Basic Plan',
            'category_en' => 'Web',
            'price' => '99.99',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_pricing_package_update_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $pricingPackage = PricingPackage::factory()->create();

        $response = $this->actingAs($admin)->put("/admin/pricing-packages/{$pricingPackage->id}", [
            'name_en' => 'Updated Plan',
            'category_en' => 'Mobile',
            'price' => '199.99',
            'features_en' => "Feature 1\nFeature 2",
            'is_active' => true,
            'order' => 2,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/pricing-packages');
        $response->assertSessionHas('success', 'Pricing package updated successfully.');

        $this->assertDatabaseHas('pricing_packages', [
            'id' => $pricingPackage->id,
            'name' => 'Updated Plan',
        ]);
    }

    public function test_admin_pricing_package_update_guest_cannot_access(): void
    {
        $pricingPackage = PricingPackage::factory()->create();

        $response = $this->put("/admin/pricing-packages/{$pricingPackage->id}", [
            'name_en' => 'Updated Plan',
            'category_en' => 'Mobile',
            'price' => '199.99',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_pricing_package_delete_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $pricingPackage = PricingPackage::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/pricing-packages/{$pricingPackage->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/pricing-packages');
        $response->assertSessionHas('success', 'Pricing package deleted successfully.');

        $this->assertDatabaseMissing('pricing_packages', ['id' => $pricingPackage->id]);
    }

    public function test_admin_pricing_package_delete_guest_cannot_access(): void
    {
        $pricingPackage = PricingPackage::factory()->create();

        $response = $this->delete("/admin/pricing-packages/{$pricingPackage->id}");

        $response->assertRedirect('/login');
    }

    // ==================== Admin - Testimonials ====================

    public function test_admin_testimonial_create_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/testimonials', [
            'name' => 'Jane Doe',
            'position_en' => 'CEO',
            'company_en' => 'Test Company',
            'email' => 'jane@example.com',
            'content_en' => 'Great service!',
            'rating' => 5,
            'status' => 'approved',
            'is_active' => true,
            'order' => 1,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/testimonials');
        $response->assertSessionHas('success', 'Testimonial created successfully.');

        $this->assertDatabaseHas('testimonials', [
            'name' => 'Jane Doe',
            'status' => 'approved',
        ]);
    }

    public function test_admin_testimonial_create_validation_fails_without_name(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/testimonials', [
            'content_en' => 'Great service!',
            'rating' => 5,
            'status' => 'approved',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_admin_testimonial_create_validation_fails_without_content(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/testimonials', [
            'name' => 'Jane Doe',
            'rating' => 5,
            'status' => 'approved',
        ]);

        $response->assertSessionHasErrors('content_en');
    }

    public function test_admin_testimonial_create_validation_fails_without_rating(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/testimonials', [
            'name' => 'Jane Doe',
            'content_en' => 'Great service!',
            'status' => 'approved',
        ]);

        $response->assertSessionHasErrors('rating');
    }

    public function test_admin_testimonial_create_validation_fails_without_status(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/testimonials', [
            'name' => 'Jane Doe',
            'content_en' => 'Great service!',
            'rating' => 5,
        ]);

        $response->assertSessionHasErrors('status');
    }

    public function test_admin_testimonial_create_guest_cannot_access(): void
    {
        $response = $this->post('/admin/testimonials', [
            'name' => 'Jane Doe',
            'content_en' => 'Great service!',
            'rating' => 5,
            'status' => 'approved',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_testimonial_update_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $testimonial = Testimonial::factory()->create();

        $response = $this->actingAs($admin)->put("/admin/testimonials/{$testimonial->id}", [
            'name' => 'Updated Name',
            'content_en' => 'Updated content',
            'rating' => 4,
            'status' => 'approved',
            'is_active' => true,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/testimonials');
        $response->assertSessionHas('success', 'Testimonial updated successfully.');

        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'name' => 'Updated Name',
        ]);
    }

    public function test_admin_testimonial_update_guest_cannot_access(): void
    {
        $testimonial = Testimonial::factory()->create();

        $response = $this->put("/admin/testimonials/{$testimonial->id}", [
            'name' => 'Updated Name',
            'content_en' => 'Updated content',
            'rating' => 4,
            'status' => 'approved',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_testimonial_approve_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $testimonial = Testimonial::factory()->create(['status' => 'pending']);

        $response = $this->actingAs($admin)->patch("/admin/testimonials/{$testimonial->id}/approve");

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success', 'Testimonial approved successfully.');

        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'status' => 'approved',
        ]);
    }

    public function test_admin_testimonial_approve_guest_cannot_access(): void
    {
        $testimonial = Testimonial::factory()->create(['status' => 'pending']);

        $response = $this->patch("/admin/testimonials/{$testimonial->id}/approve");

        $response->assertRedirect('/login');
    }

    public function test_admin_testimonial_reject_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $testimonial = Testimonial::factory()->create(['status' => 'pending']);

        $response = $this->actingAs($admin)->patch("/admin/testimonials/{$testimonial->id}/reject");

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success', 'Testimonial rejected successfully.');

        $this->assertDatabaseHas('testimonials', [
            'id' => $testimonial->id,
            'status' => 'rejected',
        ]);
    }

    public function test_admin_testimonial_reject_guest_cannot_access(): void
    {
        $testimonial = Testimonial::factory()->create(['status' => 'pending']);

        $response = $this->patch("/admin/testimonials/{$testimonial->id}/reject");

        $response->assertRedirect('/login');
    }

    public function test_admin_testimonial_delete_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $testimonial = Testimonial::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/testimonials/{$testimonial->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/testimonials');
        $response->assertSessionHas('success', 'Testimonial deleted successfully.');

        $this->assertDatabaseMissing('testimonials', ['id' => $testimonial->id]);
    }

    public function test_admin_testimonial_delete_guest_cannot_access(): void
    {
        $testimonial = Testimonial::factory()->create();

        $response = $this->delete("/admin/testimonials/{$testimonial->id}");

        $response->assertRedirect('/login');
    }

    // ==================== Admin - FAQs ====================

    public function test_admin_faq_create_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/faqs', [
            'question_en' => 'What is your return policy?',
            'answer_en' => 'We offer 30-day returns.',
            'is_active' => true,
            'order' => 1,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/faqs');
        $response->assertSessionHas('success', 'FAQ created successfully.');

        $this->assertDatabaseHas('faqs', [
            'question' => 'What is your return policy?',
        ]);
    }

    public function test_admin_faq_create_validation_fails_without_question(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/faqs', [
            'answer_en' => 'We offer 30-day returns.',
        ]);

        $response->assertSessionHasErrors('question_en');
    }

    public function test_admin_faq_create_validation_fails_without_answer(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/faqs', [
            'question_en' => 'What is your return policy?',
        ]);

        $response->assertSessionHasErrors('answer_en');
    }

    public function test_admin_faq_create_guest_cannot_access(): void
    {
        $response = $this->post('/admin/faqs', [
            'question_en' => 'What is your return policy?',
            'answer_en' => 'We offer 30-day returns.',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_faq_update_form_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $faq = Faq::factory()->create();

        $response = $this->actingAs($admin)->put("/admin/faqs/{$faq->id}", [
            'question_en' => 'Updated question',
            'answer_en' => 'Updated answer',
            'is_active' => true,
            'order' => 2,
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/faqs');
        $response->assertSessionHas('success', 'FAQ updated successfully.');

        $this->assertDatabaseHas('faqs', [
            'id' => $faq->id,
            'question' => 'Updated question',
        ]);
    }

    public function test_admin_faq_update_guest_cannot_access(): void
    {
        $faq = Faq::factory()->create();

        $response = $this->put("/admin/faqs/{$faq->id}", [
            'question_en' => 'Updated question',
            'answer_en' => 'Updated answer',
        ]);

        $response->assertRedirect('/login');
    }

    public function test_admin_faq_delete_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $faq = Faq::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/faqs/{$faq->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/faqs');
        $response->assertSessionHas('success', 'FAQ deleted successfully.');

        $this->assertDatabaseMissing('faqs', ['id' => $faq->id]);
    }

    public function test_admin_faq_delete_guest_cannot_access(): void
    {
        $faq = Faq::factory()->create();

        $response = $this->delete("/admin/faqs/{$faq->id}");

        $response->assertRedirect('/login');
    }

    // ==================== Admin - Contact Messages ====================

    public function test_admin_contact_message_mark_read_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $contactMessage = ContactMessage::factory()->create(['is_read' => false]);

        $response = $this->actingAs($admin)->patch("/admin/contact-messages/{$contactMessage->id}/mark-read");

        $response->assertSessionHasNoErrors();
        $response->assertSessionHas('success', 'Message status updated.');

        $this->assertDatabaseHas('contact_messages', [
            'id' => $contactMessage->id,
            'is_read' => true,
        ]);
    }

    public function test_admin_contact_message_mark_read_guest_cannot_access(): void
    {
        $contactMessage = ContactMessage::factory()->create(['is_read' => false]);

        $response = $this->patch("/admin/contact-messages/{$contactMessage->id}/mark-read");

        $response->assertRedirect('/login');
    }

    public function test_admin_contact_message_delete_button_works(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $contactMessage = ContactMessage::factory()->create();

        $response = $this->actingAs($admin)->delete("/admin/contact-messages/{$contactMessage->id}");

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin/contact-messages');
        $response->assertSessionHas('success', 'Message deleted successfully.');

        $this->assertDatabaseMissing('contact_messages', ['id' => $contactMessage->id]);
    }

    public function test_admin_contact_message_delete_guest_cannot_access(): void
    {
        $contactMessage = ContactMessage::factory()->create();

        $response = $this->delete("/admin/contact-messages/{$contactMessage->id}");

        $response->assertRedirect('/login');
    }

    public function test_password_reset_request_form_works(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/forgot-password', [
            'email' => $user->email,
        ]);

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }

    public function test_email_verification_resend_button_works(): void
    {
        $user = User::factory()->create(['email_verified_at' => null]);

        $response = $this->actingAs($user)->post('/email/verification-notification');

        // Public auth routes are disabled, should redirect to admin login
        $response->assertRedirect(route('admin.login'));
    }
}
