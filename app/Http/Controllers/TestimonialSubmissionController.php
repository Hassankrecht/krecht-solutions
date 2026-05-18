<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialSubmissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:3000',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = 'storage/' . $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create([
            'name' => $validated['name'],
            'position' => $validated['position'] ?? null,
            'company' => $validated['company'] ?? null,
            'email' => $validated['email'],
            'content' => $validated['message'],
            'rating' => $validated['rating'],
            'image' => $imagePath,
            'status' => Testimonial::STATUS_PENDING,
            'is_active' => false,
            'order' => 0,
            'sort_order' => 0,
        ]);

        return redirect()
            ->back()
            ->with('testimonial_success', 'Thank you! Your testimonial has been submitted and is waiting for approval.');
    }
}
