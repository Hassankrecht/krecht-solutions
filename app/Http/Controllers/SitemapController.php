<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $baseUrl = config('app.url');
        $lastmod = date('Y-m-d');

        $urls = [
            [
                'loc' => $baseUrl . '/',
                'lastmod' => $lastmod,
                'changefreq' => 'daily',
                'priority' => '1.0',
            ],
            [
                'loc' => $baseUrl . '/about',
                'lastmod' => $lastmod,
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => $baseUrl . '/services',
                'lastmod' => $lastmod,
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => $baseUrl . '/pricing',
                'lastmod' => $lastmod,
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => $baseUrl . '/portfolio',
                'lastmod' => $lastmod,
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => $baseUrl . '/contact',
                'lastmod' => $lastmod,
                'changefreq' => 'monthly',
                'priority' => '0.6',
            ],
        ];

        // Add active portfolio projects
        $projects = Project::where('is_active', true)->get();
        foreach ($projects as $project) {
            $urls[] = [
                'loc' => $baseUrl . '/portfolio/' . $project->id,
                'lastmod' => $project->updated_at->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ];
        }

        return response()->view('sitemap', compact('urls'))
            ->header('Content-Type', 'text/xml');
    }
}
