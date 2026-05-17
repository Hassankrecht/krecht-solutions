<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Project;
use App\Models\PricingPackage;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\ContactMessage;

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
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
