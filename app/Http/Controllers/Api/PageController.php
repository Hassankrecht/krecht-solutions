<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = SiteSetting::where('key', 'about_content')->first();

        return response()->json([
            'success' => true,
            'message' => 'About page retrieved successfully',
            'data' => [
                'content' => $about ? $about->value : null,
            ]
        ]);
    }

    public function privacyPolicy()
    {
        $privacy = SiteSetting::where('key', 'privacy_policy')->first();

        return response()->json([
            'success' => true,
            'message' => 'Privacy policy retrieved successfully',
            'data' => [
                'content' => $privacy ? $privacy->value : null,
            ]
        ]);
    }

    public function terms()
    {
        $terms = SiteSetting::where('key', 'terms_of_service')->first();

        return response()->json([
            'success' => true,
            'message' => 'Terms of service retrieved successfully',
            'data' => [
                'content' => $terms ? $terms->value : null,
            ]
        ]);
    }

    public function security()
    {
        $security = SiteSetting::where('key', 'security_policy')->first();

        return response()->json([
            'success' => true,
            'message' => 'Security policy retrieved successfully',
            'data' => [
                'content' => $security ? $security->value : null,
            ]
        ]);
    }
}
