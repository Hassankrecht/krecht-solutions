<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use App\Models\PricingCategory;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProjectCategory::active()
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ]);
    }

    public function pricingCategories(Request $request)
    {
        $categories = PricingCategory::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Pricing categories retrieved successfully',
            'data' => $categories
        ]);
    }

    public function pricingPackages(Request $request)
    {
        $packages = PricingPackage::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Pricing packages retrieved successfully',
            'data' => $packages
        ]);
    }

    public function pricingPackageDetails($id)
    {
        $package = PricingPackage::with('pricingCategory')
            ->active()
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Package retrieved successfully',
            'data' => $package
        ]);
    }
}
