<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::ordered()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en'               => 'required|string|max:255',
            'title_ar'               => 'nullable|string|max:255',
            'icon'                   => 'required|string|max:255',
            'short_description_en'   => 'nullable|string|max:500',
            'short_description_ar'   => 'nullable|string|max:500',
            'description_en'         => 'required|string',
            'description_ar'         => 'nullable|string',
            'is_active'              => 'boolean',
            'sort_order'             => 'integer|min:0',
        ]);
        
        // Copy English values to original fields for backward compatibility
        $validated['title'] = $validated['title_en'];
        $validated['short_description'] = $validated['short_description_en'] ?? '';
        $validated['description'] = $validated['description_en'];
        
        $validated['is_active']   = $request->boolean('is_active');
        $validated['sort_order']  = $validated['sort_order'] ?? 0;

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title_en'               => 'required|string|max:255',
            'title_ar'               => 'nullable|string|max:255',
            'icon'                   => 'required|string|max:255',
            'short_description_en'   => 'nullable|string|max:500',
            'short_description_ar'   => 'nullable|string|max:500',
            'description_en'         => 'required|string',
            'description_ar'         => 'nullable|string',
            'is_active'              => 'boolean',
            'sort_order'             => 'integer|min:0',
        ]);
        
        // Copy English values to original fields for backward compatibility
        $validated['title'] = $validated['title_en'];
        $validated['short_description'] = $validated['short_description_en'] ?? '';
        $validated['description'] = $validated['description_en'];
        
        $validated['is_active']  = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
