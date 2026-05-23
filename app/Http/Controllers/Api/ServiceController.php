<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::active()
            ->ordered()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Services retrieved successfully',
            'data' => $services
        ]);
    }

    public function show($id)
    {
        $service = Service::active()
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Service retrieved successfully',
            'data' => $service
        ]);
    }
}
