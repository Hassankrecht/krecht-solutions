<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $keepTitles = [
            'Albasha Restaurant',
            'Alikrechtgroup',
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
                'category_slugs' => ['websites'],
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
                'title'          => 'Alikrechtgroup',
                'title_en'       => 'Alikrechtgroup',
                'title_ar'       => 'مجموعة علي كريشت',
                'description'    => 'Comprehensive business management system featuring multi-language support (English/Arabic), admin dashboard, user management, product management, order processing, coupon system, pricing packages, service management, testimonials, and contact form with full admin control.',
                'description_en' => 'Comprehensive business management system featuring multi-language support (English/Arabic), admin dashboard, user management, product management, order processing, coupon system, pricing packages, service management, testimonials, and contact form with full admin control.',
                'description_ar' => 'نظام إدارة أعمال شامل يضم دعمًا متعدد اللغات (الإنجليزية/العربية)، لوحة تحكم للمسؤولين، إدارة المستخدمين، إدارة المنتجات، معالجة الطلبات، نظام القسائم، باقات الأسعار، إدارة الخدمات، شهادات العملاء، ونموذج الاتصال مع تحكم كامل للمسؤول.',
                'category_slugs' => ['websites', 'business-systems'],
                'image'          => 'assets/projects/Alikrechtgroup/En home banne.png',
                'gallery_images' => [
                    'assets/projects/Alikrechtgroup/About us.png',
                    'assets/projects/Alikrechtgroup/Ar home banner.png',
                    'assets/projects/Alikrechtgroup/dashboard 1.png',
                    'assets/projects/Alikrechtgroup/dashboard 2.png',
                    'assets/projects/Alikrechtgroup/product page.png',
                    'assets/projects/Alikrechtgroup/product detail page.png',
                    'assets/projects/Alikrechtgroup/services page.png',
                    'assets/projects/Alikrechtgroup/pricing page.png',
                    'assets/projects/Alikrechtgroup/contact page.png',
                    'assets/projects/Alikrechtgroup/login.png',
                    'assets/projects/Alikrechtgroup/register.png',
                    'assets/projects/Alikrechtgroup/team.png',
                ],
                'video'          => 'assets/projects/Alikrechtgroup/Screen Recording 2026-05-19 153930.mp4',
                'technologies'   => 'Laravel, Vue.js, MySQL, Bootstrap, TailwindCSS',
                'technologies_en' => 'Laravel, Vue.js, MySQL, Bootstrap, TailwindCSS',
                'technologies_ar' => 'Laravel، Vue.js، MySQL، Bootstrap، TailwindCSS',
                'is_active'      => true,
                'order'          => 2,
            ],
            [
                'title'          => 'Dashboard System',
                'description'    => 'Real-time business analytics dashboard with interactive charts, KPI tracking, and customizable reporting modules for data-driven decisions.',
                'category_slugs' => ['business-systems'],
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, Vue.js, Chart.js, MySQL',
                'is_active'      => true,
                'order'          => 3,
            ],
            [
                'title'          => 'Retail POS System',
                'description'    => 'Complete point-of-sale solution with barcode scanning, inventory management, multi-branch support, and detailed sales reporting.',
                'category_slugs' => ['business-systems'],
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, Vue.js, MySQL',
                'is_active'      => true,
                'order'          => 4,
            ],
            [
                'title'          => 'Business Management System',
                'description'    => 'Comprehensive ERP-style platform covering HR, inventory, accounting, and operations management in a single integrated system.',
                'category_slugs' => ['business-systems'],
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, MySQL, Bootstrap',
                'is_active'      => true,
                'order'          => 5,
            ],
            [
                'title'          => 'Flutter Mobile App',
                'description'    => 'Cross-platform mobile application built with Flutter, delivering native-like performance and a polished UI on both iOS and Android.',
                'category_slugs' => ['mobile-apps'],
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Flutter, Dart, Firebase',
                'is_active'      => true,
                'order'          => 6,
            ],
            [
                'title'          => 'Web Application Platform',
                'description'    => 'Scalable multi-tenant web platform with role-based access control, REST API integrations, and a modern responsive interface.',
                'category_slugs' => ['websites'],
                'image'          => null,
                'gallery_images' => null,
                'video'          => null,
                'technologies'   => 'Laravel, Vue.js, TailwindCSS',
                'is_active'      => true,
                'order'          => 7,
            ],
        ];

        foreach ($projects as $projectData) {
            $categorySlugs = $projectData['category_slugs'];
            unset($projectData['category_slugs']);

            $existing = Project::where('title', $projectData['title'])->first();

            if ($existing) {
                $updateData = [
                    'description'  => $projectData['description'],
                    'technologies' => $projectData['technologies'],
                    'is_active'    => $projectData['is_active'],
                    'order'        => $projectData['order'],
                    'image'        => $projectData['image'],
                    'gallery_images' => $projectData['gallery_images'],
                    'video'        => $projectData['video'],
                ];

                $existing->update($updateData);

                // Sync categories
                $categoryIds = ProjectCategory::whereIn('slug', $categorySlugs)->pluck('id');
                $existing->categories()->sync($categoryIds);
            } else {
                $project = Project::create($projectData);

                // Attach categories
                $categoryIds = ProjectCategory::whereIn('slug', $categorySlugs)->pluck('id');
                $project->categories()->attach($categoryIds);
            }
        }
    }
}
