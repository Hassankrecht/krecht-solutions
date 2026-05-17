<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->orderBy('id')->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'nullable|string|max:255',
            'company'   => 'nullable|string|max:255',
            'content'   => 'required|string',
            'rating'    => 'integer|min:1|max:5',
            'image'     => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'order'     => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['rating']    = $validated['rating'] ?? 5;
        $validated['order']     = $validated['order'] ?? 0;

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'nullable|string|max:255',
            'company'   => 'nullable|string|max:255',
            'content'   => 'required|string',
            'rating'    => 'integer|min:1|max:5',
            'image'     => 'nullable|string|max:500',
            'is_active' => 'boolean',
            'order'     => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['rating']    = $validated['rating'] ?? 5;
        $validated['order']     = $validated['order'] ?? 0;

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
