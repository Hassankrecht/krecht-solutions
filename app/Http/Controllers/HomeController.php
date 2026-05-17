<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\PricingPackage;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\SiteSetting;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        $pricingPackages = PricingPackage::active()->ordered()->get();
        $projects = Project::active()->ordered()->take(6)->get();
        $testimonials = Testimonial::active()->ordered()->get();
        $faqs = Faq::active()->ordered()->take(3)->get();
        
        $siteName = SiteSetting::get('site_name', 'Krecht Solutions');
        $siteTagline = SiteSetting::get('site_tagline', 'Software & IT Services');

        return view('home', compact(
            'services',
            'pricingPackages',
            'projects',
            'testimonials',
            'faqs',
            'siteName',
            'siteTagline'
        ));
    }
}
