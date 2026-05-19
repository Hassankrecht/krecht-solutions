<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingCategory;
use Illuminate\Http\Request;

class PricingCategoryController extends Controller
{
    public function index()
    {
        $categories = PricingCategory::ordered()->get();
        return view('admin.pricing-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pricing-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        PricingCategory::create($validated);

        return redirect()->route('admin.pricing-categories.index')
            ->with('success', 'Pricing category created successfully.');
    }

    public function edit(PricingCategory $pricingCategory)
    {
        return view('admin.pricing-categories.edit', compact('pricingCategory'));
    }

    public function update(Request $request, PricingCategory $pricingCategory)
    {
        $validated = $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $pricingCategory->update($validated);

        return redirect()->route('admin.pricing-categories.index')
            ->with('success', 'Pricing category updated successfully.');
    }

    public function destroy(PricingCategory $pricingCategory)
    {
        $pricingCategory->delete();

        return redirect()->route('admin.pricing-categories.index')
            ->with('success', 'Pricing category deleted successfully.');
    }
}
