<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderByRaw("CASE status WHEN 'pending' THEN 0 WHEN 'approved' THEN 1 ELSE 2 END")
            ->ordered()
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'position_en'  => 'nullable|string|max:255',
            'position_ar'  => 'nullable|string|max:255',
            'company_en'   => 'nullable|string|max:255',
            'company_ar'   => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'content_en'   => 'required|string',
            'content_ar'   => 'nullable|string',
            'rating'       => 'required|integer|min:1|max:5',
            'image'        => 'nullable|string|max:500',
            'status'       => 'required|in:pending,approved,rejected',
            'is_active'    => 'boolean',
            'order'        => 'integer|min:0',
            'sort_order'   => 'integer|min:0',
        ]);

        // Copy English values to original fields for backward compatibility
        $validated['position'] = $validated['position_en'] ?? '';
        $validated['company'] = $validated['company_en'] ?? '';
        $validated['content'] = $validated['content_en'];

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;
        $validated['sort_order'] = $validated['sort_order'] ?? $validated['order'];

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'position_en'  => 'nullable|string|max:255',
            'position_ar'  => 'nullable|string|max:255',
            'company_en'   => 'nullable|string|max:255',
            'company_ar'   => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'content_en'   => 'required|string',
            'content_ar'   => 'nullable|string',
            'rating'       => 'required|integer|min:1|max:5',
            'image'        => 'nullable|string|max:500',
            'status'       => 'required|in:pending,approved,rejected',
            'is_active'    => 'boolean',
            'order'        => 'integer|min:0',
            'sort_order'   => 'integer|min:0',
        ]);

        // Copy English values to original fields for backward compatibility
        $validated['position'] = $validated['position_en'] ?? '';
        $validated['company'] = $validated['company_en'] ?? '';
        $validated['content'] = $validated['content_en'];

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;
        $validated['sort_order'] = $validated['sort_order'] ?? $validated['order'];

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function approve(Testimonial $testimonial)
    {
        $testimonial->approve();

        return redirect()->back()
            ->with('success', 'Testimonial approved successfully.');
    }

    public function reject(Testimonial $testimonial)
    {
        $testimonial->reject();

        return redirect()->back()
            ->with('success', 'Testimonial rejected successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
