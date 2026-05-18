<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'Albasha Restaurant',
                'description' => 'Full-stack restaurant management platform featuring a customer-facing website with multi-language support, online table booking, food ordering, and a comprehensive admin panel with POS, kitchen management, and analytics.',
                'category'    => 'Websites',
                'image'       => 'assets/projects/Albasha restaurant/Screenshot 2026-05-18 150926.png',
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
                'video'        => 'assets/projects/Albasha restaurant/Albasha videos show.mp4',
                'technologies' => 'Laravel, Vue.js, MySQL, Bootstrap',
                'is_active'    => true,
                'order'        => 1,
            ],
            [
                'title'       => 'E-Commerce Platform',
                'description' => 'Full-featured online store with payment integration and inventory management.',
                'category'    => 'Websites',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Laravel, Vue.js, MySQL',
                'is_active'    => true,
                'order'        => 2,
            ],
            [
                'title'       => 'Food Delivery App',
                'description' => 'Cross-platform mobile app for food ordering and delivery tracking.',
                'category'    => 'Mobile Apps',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'React Native, Node.js',
                'is_active'    => true,
                'order'        => 3,
            ],
            [
                'title'       => 'Business Analytics Dashboard',
                'description' => 'Real-time analytics dashboard for business performance monitoring.',
                'category'    => 'Dashboards',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Laravel, Chart.js, MySQL',
                'is_active'    => true,
                'order'        => 4,
            ],
            [
                'title'       => 'Retail POS System',
                'description' => 'Complete point of sale system for retail stores with barcode scanning.',
                'category'    => 'POS Systems',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Laravel, Vue.js',
                'is_active'    => true,
                'order'        => 5,
            ],
            [
                'title'       => 'Inventory Management System',
                'description' => 'Advanced stock tracking and warehouse management solution.',
                'category'    => 'Business Systems',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Laravel, MySQL',
                'is_active'    => true,
                'order'        => 6,
            ],
            [
                'title'       => 'Corporate Website',
                'description' => 'Professional corporate website with CMS and multilingual support.',
                'category'    => 'Websites',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Laravel, TailwindCSS',
                'is_active'    => true,
                'order'        => 7,
            ],
            [
                'title'       => 'Healthcare App',
                'description' => 'Patient management and appointment scheduling mobile application.',
                'category'    => 'Mobile Apps',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Flutter, Firebase',
                'is_active'    => true,
                'order'        => 8,
            ],
            [
                'title'       => 'Restaurant POS',
                'description' => 'Specialized POS system for restaurants with table management.',
                'category'    => 'POS Systems',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Laravel, Vue.js',
                'is_active'    => true,
                'order'        => 9,
            ],
            [
                'title'       => 'Accounting Software',
                'description' => 'Comprehensive accounting and financial reporting system.',
                'category'    => 'Business Systems',
                'image'       => null,
                'gallery_images' => null,
                'video'       => null,
                'technologies' => 'Laravel, MySQL',
                'is_active'    => true,
                'order'        => 10,
            ],
        ];

        foreach ($projects as $project) {
            $existing = Project::where('title', $project['title'])->first();

            if ($existing) {
                $updateData = array_filter([
                    'description'    => $project['description'],
                    'category'       => $project['category'],
                    'technologies'   => $project['technologies'],
                    'is_active'      => $project['is_active'],
                    'order'          => $project['order'],
                ], fn($v) => $v !== null);

                if (!$existing->image && $project['image']) {
                    $updateData['image'] = $project['image'];
                }
                if (empty($existing->gallery_images) && $project['gallery_images']) {
                    $updateData['gallery_images'] = $project['gallery_images'];
                }
                if (!$existing->video && $project['video']) {
                    $updateData['video'] = $project['video'];
                }

                $existing->update($updateData);
            } else {
                Project::create([
                    'title'          => $project['title'],
                    'description'    => $project['description'],
                    'category'       => $project['category'],
                    'image'          => $project['image'],
                    'gallery_images' => $project['gallery_images'],
                    'video'          => $project['video'],
                    'technologies'   => $project['technologies'],
                    'is_active'      => $project['is_active'],
                    'order'          => $project['order'],
                ]);
            }
        }
    }
}
