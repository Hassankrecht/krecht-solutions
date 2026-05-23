<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(Request $request)
    {
        $settings = SiteSetting::all()->keyBy('key')->map(fn($s) => $s->value);

        return response()->json([
            'success' => true,
            'message' => 'Settings retrieved successfully',
            'data' => $settings
        ]);
    }
}
