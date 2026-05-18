<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string',
            'category'           => 'required|string|max:255',
            'image'              => 'nullable|string|max:500',
            'image_upload'       => 'nullable|image|max:10240',
            'gallery_upload.*'   => 'nullable|image|max:10240',
            'video'              => 'nullable|string|max:500',
            'video_upload'       => 'nullable|mimes:mp4,avi,mov,webm,ogg|max:204800',
            'technologies'       => 'nullable|string|max:500',
            'is_active'          => 'boolean',
            'order'              => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;

        $validated['image']          = $this->handleImageUpload($request, null);
        $validated['gallery_images'] = $this->handleGalleryUpload($request, []);
        $validated['video']          = $this->handleVideoUpload($request, null);

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
            'title'              => 'required|string|max:255',
            'description'        => 'nullable|string',
            'category'           => 'required|string|max:255',
            'image'              => 'nullable|string|max:500',
            'image_upload'       => 'nullable|image|max:10240',
            'gallery_upload.*'   => 'nullable|image|max:10240',
            'video'              => 'nullable|string|max:500',
            'video_upload'       => 'nullable|mimes:mp4,avi,mov,webm,ogg|max:204800',
            'technologies'       => 'nullable|string|max:500',
            'is_active'          => 'boolean',
            'order'              => 'integer|min:0',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order']     = $validated['order'] ?? 0;

        $validated['image']          = $this->handleImageUpload($request, $project->image);
        $validated['gallery_images'] = $this->handleGalleryUpload($request, $project->gallery_images ?? []);
        $validated['video']          = $this->handleVideoUpload($request, $project->video);

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

    private function handleImageUpload(Request $request, ?string $current): ?string
    {
        if ($request->boolean('remove_image')) {
            return null;
        }

        if ($request->hasFile('image_upload') && $request->file('image_upload')->isValid()) {
            $file     = $request->file('image_upload');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/projects'), $filename);
            return 'assets/projects/' . $filename;
        }

        $path = trim($request->input('image', ''));
        return $path !== '' ? $path : $current;
    }

    private function handleGalleryUpload(Request $request, array $existing): array
    {
        $toRemove = $request->input('remove_gallery', []);
        $gallery  = array_values(array_filter($existing, fn ($img) => !in_array($img, $toRemove)));

        if ($request->hasFile('gallery_upload')) {
            foreach ($request->file('gallery_upload') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . uniqid() . '_'
                                . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                                . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('assets/projects'), $filename);
                    $gallery[] = 'assets/projects/' . $filename;
                }
            }
        }

        return $gallery;
    }

    private function handleVideoUpload(Request $request, ?string $current): ?string
    {
        if ($request->boolean('remove_video')) {
            return null;
        }

        if ($request->hasFile('video_upload') && $request->file('video_upload')->isValid()) {
            $file     = $request->file('video_upload');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                        . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/projects'), $filename);
            return 'assets/projects/' . $filename;
        }

        $path = trim($request->input('video', ''));
        return $path !== '' ? $path : $current;
    }
}
