<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class PricingPackageController extends Controller
{
    public function index()
    {
        $pricingPackages = PricingPackage::ordered()->orderBy('id')->paginate(15);
        return view('admin.pricing-packages.index', compact('pricingPackages'));
    }

    public function create()
    {
        $categories = \App\Models\PricingCategory::active()->ordered()->get();

        return view('admin.pricing-packages.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_en'             => 'required|string|max:255',
            'name_ar'             => 'nullable|string|max:255',
            'pricing_category_id' => 'required|exists:pricing_categories,id',
            'price'               => 'required|string|max:100',
            'features_en'         => 'nullable|string',
            'features_ar'         => 'nullable|string',
            'is_featured'         => 'boolean',
            'is_active'           => 'boolean',
            'order'               => 'integer|min:0',
        ]);

        // Copy English values to original fields for backward compatibility
        $validated['name'] = $validated['name_en'];
        $validated['features'] = $this->parseFeatures($request->input('features_en'));
        $validated['features_en'] = $this->parseFeatures($request->input('features_en'));
        $validated['features_ar'] = $this->parseFeatures($request->input('features_ar'));

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active']   = $request->boolean('is_active');
        $validated['order']       = $validated['order'] ?? 0;

        PricingPackage::create($validated);

        return redirect()->route('admin.pricing-packages.index')
            ->with('success', 'Pricing package created successfully.');
    }

    public function edit(PricingPackage $pricingPackage)
    {
        $categories = \App\Models\PricingCategory::active()->ordered()->get();

        return view('admin.pricing-packages.edit', compact('pricingPackage', 'categories'));
    }

    public function update(Request $request, PricingPackage $pricingPackage)
    {
        $validated = $request->validate([
            'name_en'             => 'required|string|max:255',
            'name_ar'             => 'nullable|string|max:255',
            'pricing_category_id' => 'required|exists:pricing_categories,id',
            'price'               => 'required|string|max:100',
            'features_en'         => 'nullable|string',
            'features_ar'         => 'nullable|string',
            'is_featured'         => 'boolean',
            'is_active'           => 'boolean',
            'order'               => 'integer|min:0',
        ]);

        // Copy English values to original fields for backward compatibility
        $validated['name'] = $validated['name_en'];
        $validated['features'] = $this->parseFeatures($request->input('features_en'));
        $validated['features_en'] = $this->parseFeatures($request->input('features_en'));
        $validated['features_ar'] = $this->parseFeatures($request->input('features_ar'));

        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active']   = $request->boolean('is_active');
        $validated['order']       = $validated['order'] ?? 0;

        $pricingPackage->update($validated);

        return redirect()->route('admin.pricing-packages.index')
            ->with('success', 'Pricing package updated successfully.');
    }

    public function destroy(PricingPackage $pricingPackage)
    {
        $pricingPackage->delete();

        return redirect()->route('admin.pricing-packages.index')
            ->with('success', 'Pricing package deleted successfully.');
    }

    private function parseFeatures(?string $input): array
    {
        if (empty($input)) {
            return [];
        }
        return array_values(array_filter(array_map('trim', explode("\n", $input))));
    }
}
