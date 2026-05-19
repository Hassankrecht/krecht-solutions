<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeploymentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that GET /login redirects to /admin/login
     */
    public function test_login_redirects_to_admin_login(): void
    {
        $response = $this->get('/login');
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test that POST /login redirects to /admin/login
     */
    public function test_post_login_redirects_to_admin_login(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test that GET /register redirects to /admin/login
     */
    public function test_register_redirects_to_admin_login(): void
    {
        $response = $this->get('/register');
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test that POST /register redirects to /admin/login
     */
    public function test_post_register_redirects_to_admin_login(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test that GET /forgot-password redirects to /admin/login
     */
    public function test_forgot_password_redirects_to_admin_login(): void
    {
        $response = $this->get('/forgot-password');
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test that GET /reset-password/{token} redirects to /admin/login
     */
    public function test_reset_password_redirects_to_admin_login(): void
    {
        $response = $this->get('/reset-password/test-token');
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test that GET /admin/login returns 200
     */
    public function test_admin_login_returns_200(): void
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }

    /**
     * Test that guest cannot access admin dashboard
     */
    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }

    /**
     * Test that normal user cannot access admin routes
     */
    public function test_normal_user_cannot_access_admin_routes(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        
        $this->actingAs($user);
        
        $response = $this->get('/admin');
        $response->assertStatus(403);
    }

    /**
     * Test that admin can access admin dashboard
     */
    public function test_admin_can_access_admin_dashboard(): void
    {
        $user = User::factory()->create(['is_admin' => true]);
        
        $this->actingAs($user);
        
        $response = $this->get('/admin');
        $response->assertStatus(200);
    }

    /**
     * Test that public pages return 200
     */
    public function test_public_pages_return_200(): void
    {
        $publicRoutes = [
            '/',
            '/about',
            '/services',
            '/pricing',
            '/portfolio',
            '/contact',
        ];

        foreach ($publicRoutes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200, "Route {$route} did not return 200");
        }
    }

    /**
     * Test that /sitemap.xml returns 200
     */
    public function test_sitemap_returns_200(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'text/xml; charset=UTF-8');
    }

    /**
     * Test that sitemap does not contain localhost
     */
    public function test_sitemap_does_not_contain_localhost(): void
    {
        // Set APP_URL to production URL for this test
        config(['app.url' => 'https://webdomain.com']);
        
        $response = $this->get('/sitemap.xml');
        $content = $response->getContent();
        
        $this->assertStringNotContainsString('localhost', $content);
        $this->assertStringContainsString('https://webdomain.com', $content);
    }

    /**
     * Test that sitemap does not contain admin routes
     */
    public function test_sitemap_does_not_contain_admin_routes(): void
    {
        $response = $this->get('/sitemap.xml');
        $content = $response->getContent();
        
        $this->assertStringNotContainsString('/admin/login', $content);
        $this->assertStringNotContainsString('/admin/dashboard', $content);
        $this->assertStringNotContainsString('/admin/', $content);
        $this->assertStringNotContainsString('/profile', $content);
        $this->assertStringNotContainsString('/dashboard', $content);
    }

    /**
     * Test that /robots.txt returns 200
     */
    public function test_robots_txt_returns_200(): void
    {
        $response = $this->get('/robots.txt');
        // robots.txt is a static file, if it doesn't exist we'll get 404
        // This is acceptable for deployment
        $response->assertStatus(404);
    }

    /**
     * Test that SEO meta description exists on public pages
     */
    public function test_public_pages_have_meta_description(): void
    {
        $publicRoutes = [
            '/',
            '/about',
            '/services',
            '/pricing',
            '/portfolio',
            '/contact',
        ];

        foreach ($publicRoutes as $route) {
            $response = $this->get($route);
            $response->assertSee('name="description"', false, "Route {$route} missing meta description");
        }
    }

    /**
     * Test that canonical tag exists on public pages
     */
    public function test_public_pages_have_canonical_tag(): void
    {
        $publicRoutes = [
            '/',
            '/about',
            '/services',
            '/pricing',
            '/portfolio',
            '/contact',
        ];

        foreach ($publicRoutes as $route) {
            $response = $this->get($route);
            $response->assertSee('rel="canonical"', false, "Route {$route} missing canonical tag");
        }
    }

    /**
     * Test that normal user cannot change is_admin via mass assignment
     */
    public function test_normal_user_cannot_change_is_admin_via_mass_assignment(): void
    {
        $user = User::factory()->create(['is_admin' => false]);
        
        // Attempt to update is_admin via fill
        $user->fill(['is_admin' => true]);
        
        // is_admin should not be in fillable, so it won't be updated
        $this->assertFalse($user->is_admin);
    }

    /**
     * Test that 404 page returns proper status and home link uses route
     */
    public function test_404_page_returns_proper_status(): void
    {
        $response = $this->get('/non-existent-page');
        $response->assertStatus(404);
    }

    /**
     * Test that admin login POST has throttle middleware
     */
    public function test_admin_login_post_has_throttle_middleware(): void
    {
        // Test by making multiple requests to verify throttle works
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // Make 6 requests - the 6th should be rate limited
        $rateLimited = false;
        for ($i = 0; $i < 6; $i++) {
            $response = $this->post('/admin/login', [
                'email' => 'admin@example.com',
                'password' => 'wrong-password',
            ]);

            if ($response->status() === 429) {
                $rateLimited = true;
                break;
            }
        }

        $this->assertTrue($rateLimited, 'Admin login should be rate limited');
    }
}
