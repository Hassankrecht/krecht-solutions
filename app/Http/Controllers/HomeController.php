<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\PricingPackage;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::active()->ordered()->get();
        $pricingPackages = PricingPackage::active()->ordered()->get();
        $projects = Project::active()->ordered()->take(6)->get();
        $testimonials = Testimonial::approved()->active()->ordered()->get();
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

    public function switchLanguage(Request $request)
    {
        $request->validate([
            'locale' => 'required|in:en,ar',
        ]);

        session()->put('locale', $request->locale);

        return redirect()->back();
    }
}
