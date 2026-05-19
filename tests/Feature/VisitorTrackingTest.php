<?php

namespace Tests\Feature;

use App\Models\Visitor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VisitorTrackingTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that visiting public page creates visitor record
     */
    public function test_visiting_public_page_creates_visitor_record(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $this->assertDatabaseHas('visitors', [
            'visit_date' => today()->toDateString(),
        ]);
    }

    /**
     * Test that visiting admin page does not create visitor record
     */
    public function test_visiting_admin_page_does_not_create_visitor_record(): void
    {
        Visitor::create([
            'session_id' => 'test-session',
            'visit_date' => today()->toDateString(),
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Test Agent',
        ]);

        $initialCount = Visitor::count();

        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $this->assertEquals($initialCount, Visitor::count());
    }

    /**
     * Test that same visitor is not counted many times in same day
     */
    public function test_same_visitor_is_not_counted_many_times_in_same_day(): void
    {
        // Visit the page multiple times
        $this->get('/');
        $this->get('/');
        $this->get('/');

        // Should only have one visitor record for this session today
        $visitorCount = Visitor::where('visit_date', today()->toDateString())
            ->where('session_id', session()->getId())
            ->count();

        $this->assertEquals(1, $visitorCount);
    }

    /**
     * Test that admin dashboard shows total visitors
     */
    public function test_admin_dashboard_shows_total_visitors(): void
    {
        // Create some visitor records
        Visitor::create([
            'session_id' => 'session-1',
            'visit_date' => today()->toDateString(),
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Test Agent 1',
        ]);

        Visitor::create([
            'session_id' => 'session-2',
            'visit_date' => today()->subDay()->toDateString(),
            'ip_address' => '127.0.0.1',
            'user_agent' => 'Test Agent 2',
        ]);

        $admin = \App\Models\User::factory()->create(['is_admin' => true]);
        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Total Visitors');
        $response->assertSee('2'); // Total visitors count
    }
}
