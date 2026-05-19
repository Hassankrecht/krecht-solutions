<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Service;
use App\Models\PricingPackage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test home page SEO elements
     */
    public function test_home_page_seo(): void
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('</title>', false);
        $response->assertSee('<h1>', false);
        $response->assertSee('</h1>', false);
        $response->assertSee('lang=', false);
        
        // Check that noindex is not present (unless intended)
        $response->assertDontSee('noindex', false);
    }

    /**
     * Test about page SEO elements
     */
    public function test_about_page_seo(): void
    {
        $response = $this->get('/about');
        
        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('</title>', false);
        $response->assertSee('<h1>', false);
        $response->assertSee('</h1>', false);
        $response->assertSee('lang=', false);
        $response->assertDontSee('noindex', false);
    }

    /**
     * Test services page SEO elements
     */
    public function test_services_page_seo(): void
    {
        $response = $this->get('/services');
        
        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('</title>', false);
        $response->assertSee('<h1>', false);
        $response->assertSee('</h1>', false);
        $response->assertSee('lang=', false);
        $response->assertDontSee('noindex', false);
    }

    /**
     * Test pricing page SEO elements
     */
    public function test_pricing_page_seo(): void
    {
        $response = $this->get('/pricing');
        
        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('</title>', false);
        $response->assertSee('<h1>', false);
        $response->assertSee('</h1>', false);
        $response->assertSee('lang=', false);
        $response->assertDontSee('noindex', false);
    }

    /**
     * Test portfolio page SEO elements
     */
    public function test_portfolio_page_seo(): void
    {
        $response = $this->get('/portfolio');
        
        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('</title>', false);
        $response->assertSee('<h1>', false);
        $response->assertSee('</h1>', false);
        $response->assertSee('lang=', false);
        $response->assertDontSee('noindex', false);
    }

    /**
     * Test contact page SEO elements
     */
    public function test_contact_page_seo(): void
    {
        $response = $this->get('/contact');
        
        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('</title>', false);
        $response->assertSee('<h1>', false);
        $response->assertSee('</h1>', false);
        $response->assertSee('lang=', false);
        $response->assertDontSee('noindex', false);
    }

    /**
     * Test portfolio detail page SEO elements
     */
    public function test_portfolio_detail_page_seo(): void
    {
        $project = Project::factory()->create([
            'is_active' => true,
            'title' => 'Test Project',
            'description' => 'Test project description for SEO'
        ]);

        $response = $this->get("/portfolio/{$project->id}");
        
        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('</title>', false);
        $response->assertSee('<h1>', false);
        $response->assertSee('</h1>', false);
        $response->assertSee('lang=', false);
        $response->assertDontSee('noindex', false);
        
        // Check that project title is visible
        $response->assertSee($project->title);
    }

    /**
     * Test that robots.txt file exists
     */
    public function test_robots_txt_file_exists(): void
    {
        $this->assertFileExists(public_path('robots.txt'));
    }

    /**
     * Test that sitemap.xml route works
     */
    public function test_sitemap_xml_route_works(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
    }

    /**
     * Test lang attribute for English locale
     */
    public function test_lang_attribute_for_english_locale(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');
        
        $content = $response->getContent();
        $this->assertStringContainsString('lang="en"', $content);
    }

    /**
     * Test lang attribute for Arabic locale
     */
    public function test_lang_attribute_for_arabic_locale(): void
    {
        $response = $this->withSession(['locale' => 'ar'])->get('/');
        
        $content = $response->getContent();
        $this->assertStringContainsString('lang="ar"', $content);
    }

    /**
     * Test all public pages return status 200
     */
    public function test_all_public_pages_return_200(): void
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
     * Test all public pages have title tags
     */
    public function test_all_public_pages_have_title_tags(): void
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
            $response->assertSee('<title>', false, "Route {$route} missing <title> tag");
            $response->assertSee('</title>', false, "Route {$route} missing closing </title> tag");
        }
    }

    /**
     * Test all public pages have h1 tags
     */
    public function test_all_public_pages_have_h1_tags(): void
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
            $response->assertSee('<h1>', false, "Route {$route} missing <h1> tag");
            $response->assertSee('</h1>', false, "Route {$route} missing closing </h1> tag");
        }
    }

    /**
     * Test all public pages have lang attribute
     */
    public function test_all_public_pages_have_lang_attribute(): void
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
            $response->assertSee('lang=', false, "Route {$route} missing lang attribute");
        }
    }

    /**
     * Test all public pages do not have noindex
     */
    public function test_all_public_pages_do_not_have_noindex(): void
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
            $response->assertDontSee('noindex', false, "Route {$route} should not have noindex");
        }
    }

    /**
     * Test portfolio detail page returns 404 for inactive project
     */
    public function test_portfolio_detail_page_returns_404_for_inactive_project(): void
    {
        $project = Project::factory()->create(['is_active' => false]);

        $response = $this->get("/portfolio/{$project->id}");
        $response->assertStatus(404);
    }

    /**
     * Test portfolio detail page returns 200 for active project
     */
    public function test_portfolio_detail_page_returns_200_for_active_project(): void
    {
        $project = Project::factory()->create(['is_active' => true]);

        $response = $this->get("/portfolio/{$project->id}");
        $response->assertStatus(200);
    }

    /**
     * Test 404 page returns proper status
     */
    public function test_404_page_returns_proper_status(): void
    {
        $response = $this->get('/non-existent-page');
        $response->assertStatus(404);
    }

    /**
     * Test active services are visible on services page
     */
    public function test_active_services_are_visible_on_services_page(): void
    {
        $service = Service::factory()->create(['is_active' => true]);

        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertSee($service->title);
    }

    /**
     * Test inactive services are not visible on services page
     */
    public function test_inactive_services_are_not_visible_on_services_page(): void
    {
        $service = Service::factory()->create(['is_active' => false]);

        $response = $this->get('/services');
        $response->assertStatus(200);
        $response->assertDontSee($service->title);
    }

    /**
     * Test active projects are visible on portfolio page
     */
    public function test_active_projects_are_visible_on_portfolio_page(): void
    {
        $project = Project::factory()->create(['is_active' => true]);

        $response = $this->get('/portfolio');
        $response->assertStatus(200);
        $response->assertSee($project->title);
    }

    /**
     * Test inactive projects are not visible on portfolio page
     */
    public function test_inactive_projects_are_not_visible_on_portfolio_page(): void
    {
        $project = Project::factory()->create(['is_active' => false]);

        $response = $this->get('/portfolio');
        $response->assertStatus(200);
        $response->assertDontSee($project->title);
    }

    /**
     * Test active pricing packages are visible on pricing page
     */
    public function test_active_pricing_packages_are_visible_on_pricing_page(): void
    {
        $package = PricingPackage::factory()->create(['is_active' => true]);

        $response = $this->get('/pricing');
        $response->assertStatus(200);
        $response->assertSee($package->name);
    }

    /**
     * Test inactive pricing packages are not visible on pricing page
     */
    public function test_inactive_pricing_packages_are_not_visible_on_pricing_page(): void
    {
        $package = PricingPackage::factory()->create(['is_active' => false]);

        $response = $this->get('/pricing');
        $response->assertStatus(200);
        $response->assertDontSee($package->name);
    }

    /**
     * Test ID based URLs work correctly
     */
    public function test_id_based_urls_work_correctly(): void
    {
        $project = Project::factory()->create(['is_active' => true]);

        $response = $this->get("/portfolio/{$project->id}");
        $response->assertStatus(200);
    }

    /**
     * Test non existent project ID returns 404
     */
    public function test_non_existent_project_id_returns_404(): void
    {
        $response = $this->get('/portfolio/99999');
        $response->assertStatus(404);
    }
}
