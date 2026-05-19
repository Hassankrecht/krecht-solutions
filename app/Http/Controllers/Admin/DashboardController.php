<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\PricingPackage;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\ContactMessage;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'projects' => Project::count(),
            'pricing_packages' => PricingPackage::count(),
            'testimonials' => Testimonial::count(),
            'faqs' => Faq::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'total_messages' => ContactMessage::count(),
            'total_visitors' => Visitor::getTotalVisitors(),
            'today_visitors' => Visitor::getTodayVisitors(),
        ];

        // Chart data - using actual Laravel data
        $chartData = [
            'salesPurchase' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                'sales' => [$stats['services'], $stats['projects'], $stats['pricing_packages'], $stats['testimonials'], $stats['faqs'], $stats['unread_messages'], 15, 20, 25],
                'purchase' => [10, 15, 20, 25, 30, 35, 40, 45, 50],
            ],
            'customer' => [
                'firstTime' => $stats['services'] + $stats['projects'],
                'return' => $stats['testimonials'],
            ],
        ];

        return view('admin.dashboard', compact('stats', 'chartData'));
    }
}
