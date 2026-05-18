<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $keepTitles = [
            'Albasha Restaurant',
            'Dashboard System',
            'Retail POS System',
            'Business Management System',
            'Flutter Mobile App',
            'Web Application Platform',
        ];

        Project::whereNotIn('title', $keepTitles)->delete();

        $projects = [
            [
                'title'          => 'Albasha Restaurant',
                'description'    => 'Full-stack restaurant management platform featuring a customer-facing website with multi-language support, online table booking, food ordering, and a comprehensive admin panel with POS, kitchen management, and real-time analytics.',
                'category'       => 'Websites',
                'image'          => 'assets/projects/Albasha restaurant/Screenshot 2026-05-18 150926.png',
                'gallery_images' => [
                    'assets/projects/Albasha restaurant/Hero banner lang list.png',
                    'assets/projects/Albasha restaurant/food menu page.png',
                    'assets/projects/Albasha restaurant/booking table page.png',
                    'assets/projects/Albasha restaurant/login page.png',
                    'assets/projects/Albasha restaurant/register page.png',
                    'assets/projects/Albasha restaurant/dashboard page.png',
                    'assets/projects/Albasha restaurant/orders page.png',
                    'assets/projects/Albasha restaurant/services page.png',
                    'assets/projects/Albasha restaurant/about us.png',
                    'assets/projects/Albasha restaurant/our team.png',
                    'assets/projects/Albasha restaurant/contact page.png',
                    'assets/projects/Albasha restaurant/footer.png',
                ],
                'video'          => 'assets/projects/Albasha restaurant/Albasha videos show.mp4',
                'technologies'   => 'Laravel, Vue.js, MySQL, Bootstrap',
                'is_active'      => true,
                'order'          => 1,
            ],
            [
                'title'          => 'Dashboard System',
                'description'    => 'Real-time business analytics dashboard with interactive charts, KPI tracking, and customizable reporting modules for data-driven decisions.',
                'category'       => 'Dashboards',
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, Vue.js, Chart.js, MySQL',
                'is_active'      => true,
                'order'          => 2,
            ],
            [
                'title'          => 'Retail POS System',
                'description'    => 'Complete point-of-sale solution with barcode scanning, inventory management, multi-branch support, and detailed sales reporting.',
                'category'       => 'POS Systems',
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, Vue.js, MySQL',
                'is_active'      => true,
                'order'          => 3,
            ],
            [
                'title'          => 'Business Management System',
                'description'    => 'Comprehensive ERP-style platform covering HR, inventory, accounting, and operations management in a single integrated system.',
                'category'       => 'Business Systems',
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, MySQL, Bootstrap',
                'is_active'      => true,
                'order'          => 4,
            ],
            [
                'title'          => 'Flutter Mobile App',
                'description'    => 'Cross-platform mobile application built with Flutter, delivering native-like performance and a polished UI on both iOS and Android.',
                'category'       => 'Mobile Apps',
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Flutter, Dart, Firebase',
                'is_active'      => true,
                'order'          => 5,
            ],
            [
                'title'          => 'Web Application Platform',
                'description'    => 'Scalable multi-tenant web platform with role-based access control, REST API integrations, and a modern responsive interface.',
                'category'       => 'Websites',
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, Vue.js, TailwindCSS',
                'is_active'      => true,
                'order'          => 6,
            ],
        ];

        foreach ($projects as $project) {
            $existing = Project::where('title', $project['title'])->first();

            if ($existing) {
                $updateData = [
                    'description'  => $project['description'],
                    'category'     => $project['category'],
                    'technologies' => $project['technologies'],
                    'is_active'    => $project['is_active'],
                    'order'        => $project['order'],
                    'image'        => $project['image'],
                    'gallery_images' => $project['gallery_images'],
                    'video'        => $project['video'],
                ];

                $existing->update($updateData);
            } else {
                Project::create($project);
            }
        }
    }
}
