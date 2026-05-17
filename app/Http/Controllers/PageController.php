<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\PricingPackage;
use App\Models\Project;
use App\Models\SiteSetting;

class PageController extends Controller
{
    public function about()
    {
        $siteName = SiteSetting::get('site_name', 'Krecht Solutions');
        $siteTagline = SiteSetting::get('site_tagline', 'Software & IT Services');
        
        return view('pages.about', compact('siteName', 'siteTagline'));
    }

    public function services()
    {
        $services = Service::active()->ordered()->get();
        $siteName = SiteSetting::get('site_name', 'Krecht Solutions');
        $siteTagline = SiteSetting::get('site_tagline', 'Software & IT Services');
        
        return view('pages.services', compact('services', 'siteName', 'siteTagline'));
    }

    public function pricing()
    {
        $packages = PricingPackage::active()->ordered()->get();
        $siteName = SiteSetting::get('site_name', 'Krecht Solutions');
        $siteTagline = SiteSetting::get('site_tagline', 'Software & IT Services');
        
        return view('pages.pricing', compact('packages', 'siteName', 'siteTagline'));
    }

    public function portfolio()
    {
        $projects = Project::active()->ordered()->get();
        $categories = Project::active()->select('category')->distinct()->pluck('category');
        $siteName = SiteSetting::get('site_name', 'Krecht Solutions');
        $siteTagline = SiteSetting::get('site_tagline', 'Software & IT Services');
        
        return view('pages.portfolio', compact('projects', 'categories', 'siteName', 'siteTagline'));
    }
}
