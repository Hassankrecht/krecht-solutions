<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Service;
use App\Models\Faq;
use App\Models\SiteSetting;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->keyBy('key')->map(fn($s) => $s->value);

        $latestProjects = Project::with('categories')
            ->active()
            ->ordered()
            ->limit(6)
            ->get();

        $services = Service::active()
            ->ordered()
            ->get();

        $featuredProducts = Product::with('category')
            ->active()
            ->ordered()
            ->limit(6)
            ->get();

        $faqs = Faq::active()
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Home data loaded successfully',
            'data' => [
                'settings' => $settings,
                'services' => $services,
                'latest_projects' => $latestProjects,
                'featured_products' => $featuredProducts,
                'faqs' => $faqs,
            ]
        ]);
    }
}
