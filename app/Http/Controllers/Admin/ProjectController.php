<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order')->orderBy('id')->paginate(15);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'category'     => 'required|string|max:255',
            'image'        => 'nullable|string|max:500',
            'technologies' => 'nullable|string|max:500',
            'is_active'    => 'boolean',
            'order'        => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'description'  => 'nullable|string',
            'category'     => 'required|string|max:255',
            'image'        => 'nullable|string|max:500',
            'technologies' => 'nullable|string|max:500',
            'is_active'    => 'boolean',
            'order'        => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
