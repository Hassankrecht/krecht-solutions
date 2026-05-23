<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('categories')->active();

        if ($request->filled('category')) {
            $query->whereHas('categories', fn($q) => $q->where('slug', $request->category));
        }

        $projects = $query->ordered()->paginate($request->get('per_page', 12));

        return response()->json([
            'success' => true,
            'message' => 'Projects retrieved successfully',
            'data' => $projects
        ]);
    }

    public function show($id)
    {
        $project = Project::with('categories')
            ->active()
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Project retrieved successfully',
            'data' => $project
        ]);
    }
}
