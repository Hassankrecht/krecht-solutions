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
            'AKG Mobile App',
            'AKG Dashboard',
            'Krecht Solutions Dashboard',
            'Restaurant Web',
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
                'title'          => 'AKG Mobile App',
                'title_en'       => 'AKG Mobile App',
                'title_ar'       => 'تطبيق AKG للهاتف المحمول',
                'description'    => 'Modern mobile application built with Flutter for AKG, featuring user authentication, product browsing, order management, real-time notifications, and a seamless user experience across iOS and Android platforms.',
                'description_en' => 'Modern mobile application built with Flutter for AKG, featuring user authentication, product browsing, order management, real-time notifications, and a seamless user experience across iOS and Android platforms.',
                'description_ar' => 'تطبيق هاتف محمول حديث مبني باستخدام Flutter لـ AKG، يتميز بالمصادقة للمستخدمين، تصفح المنتجات، إدارة الطلبات، الإشعارات الفورية، وتجربة مستخدم سلسة عبر منصتي iOS و Android.',
                'category_slugs' => ['mobile-apps'],
                'image'          => 'assets/projects/Akg mobiela app/Screenshot_20260519-164758.png',
                'gallery_images' => [
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164758.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164809.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164843.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164851.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164914.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164922.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164938.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-164957.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-165049.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-165057.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-165118.png',
                    'assets/projects/Akg mobiela app/Screenshot_20260519-165126.png',
                ],
                'video'          => 'assets/projects/Akg mobiela app/screen-20260519-165843.mp4',
                'technologies'   => 'Flutter, Dart, Firebase, REST API',
                'technologies_en' => 'Flutter, Dart, Firebase, REST API',
                'technologies_ar' => 'Flutter، Dart، Firebase، REST API',
                'is_active'      => true,
                'order'          => 3,
            ],
            [
                'title'          => 'AKG Dashboard',
                'title_en'       => 'AKG Dashboard',
                'title_ar'       => 'لوحة تحكم AKG',
                'description'    => 'Comprehensive admin dashboard for AKG featuring user management, product administration, order tracking, coupon management, income analytics, testimonials management, and settings configuration with a modern responsive interface.',
                'description_en' => 'Comprehensive admin dashboard for AKG featuring user management, product administration, order tracking, coupon management, income analytics, testimonials management, and settings configuration with a modern responsive interface.',
                'description_ar' => 'لوحة تحكم شاملة لـ AKG تتميز بإدارة المستخدمين، إدارة المنتجات، تتبع الطلبات، إدارة القسائم، تحليلات الدخل، إدارة شهادات العملاء، وإعدادات التكوين مع واجهة متجاوبة حديثة.',
                'category_slugs' => ['business-systems'],
                'image'          => 'assets/projects/Akg-dashboard/dashboard 1.png',
                'gallery_images' => [
                    'assets/projects/Akg-dashboard/dashboard 1.png',
                    'assets/projects/Akg-dashboard/dashboard 2.png',
                    'assets/projects/Akg-dashboard/user manegmnet.png',
                    'assets/projects/Akg-dashboard/product admin.png',
                    'assets/projects/Akg-dashboard/project admin.png',
                    'assets/projects/Akg-dashboard/orders.png',
                    'assets/projects/Akg-dashboard/orders report 1.png',
                    'assets/projects/Akg-dashboard/coupons.png',
                    'assets/projects/Akg-dashboard/coupons 1.png',
                    'assets/projects/Akg-dashboard/income.png',
                    'assets/projects/Akg-dashboard/income 1.png',
                    'assets/projects/Akg-dashboard/testi.imials adamin.png',
                    'assets/projects/Akg-dashboard/app home settings.png',
                    'assets/projects/Akg-dashboard/home settings  1.png',
                    'assets/projects/Akg-dashboard/contavct admin.png',
                    'assets/projects/Akg-dashboard/admin manegment.png',
                ],
                'video'          => 'assets/projects/Akg-dashboard/Screen Recording 2026-05-19 154108.mp4',
                'technologies'   => 'Laravel, Vue.js, MySQL, Bootstrap, Chart.js',
                'technologies_en' => 'Laravel, Vue.js, MySQL, Bootstrap, Chart.js',
                'technologies_ar' => 'Laravel، Vue.js، MySQL، Bootstrap، Chart.js',
                'is_active'      => true,
                'order'          => 4,
            ],
            [
                'title'          => 'Krecht Solutions Dashboard',
                'title_en'       => 'Krecht Solutions Dashboard',
                'title_ar'       => 'لوحة تحكم حلول كريشت',
                'description'    => 'Professional admin dashboard for Krecht Solutions featuring comprehensive project management, service administration, pricing package management, testimonial handling, FAQ management, contact message tracking, and analytics with a clean modern design.',
                'description_en' => 'Professional admin dashboard for Krecht Solutions featuring comprehensive project management, service administration, pricing package management, testimonial handling, FAQ management, contact message tracking, and analytics with a clean modern design.',
                'description_ar' => 'لوحة تحكم احترافية لحلول كريشت تتميز بإدارة المشاريع الشاملة، إدارة الخدمات، إدارة باقات الأسعار، معالجة شهادات العملاء، إدارة الأسئلة الشائعة، تتبع رسائل الاتصال، والتحليلات مع تصميم حديث ونظيف.',
                'category_slugs' => ['business-systems'],
                'image'          => 'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191500.png',
                'gallery_images' => [
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191500.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191513.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191523.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191535.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191555.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191603.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191616.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191745.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191757.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191815.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191823.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 191836.png',
                    'assets/projects/krechtsolutions dashboard/Screenshot 2026-05-19 192620.png',
                ],
                'video'          => 'assets/projects/krechtsolutions dashboard/Screen Recording 2026-05-19 192758.mp4',
                'technologies'   => 'Laravel, Vue.js, MySQL, TailwindCSS, Bootstrap',
                'technologies_en' => 'Laravel, Vue.js, MySQL, TailwindCSS, Bootstrap',
                'technologies_ar' => 'Laravel، Vue.js، MySQL، TailwindCSS، Bootstrap',
                'is_active'      => true,
                'order'          => 5,
            ],
            [
                'title'          => 'Restaurant Web',
                'title_en'       => 'Restaurant Web',
                'title_ar'       => 'مطعم ويب',
                'description'    => 'Modern restaurant website featuring an elegant hero section, multi-language support (English/Arabic), food menu display with categories, table reservation system, contact form, testimonials showcase, and responsive design optimized for all devices.',
                'description_en' => 'Modern restaurant website featuring an elegant hero section, multi-language support (English/Arabic), food menu display with categories, table reservation system, contact form, testimonials showcase, and responsive design optimized for all devices.',
                'description_ar' => 'موقع مطعم حديث يتميز بقسم رئيسي أنيق، دعم متعدد اللغات (الإنجليزية/العربية)، عرض قائمة الطعام مع الفئات، نظام حجز الطاولات، نموذج الاتصال، عرض شهادات العملاء، وتصميم متجاوب محسن لجميع الأجهزة.',
                'category_slugs' => ['websites'],
                'image'          => 'assets/projects/restoran web/Screenshot 2026-05-19 171539.png',
                'gallery_images' => [
                    'assets/projects/restoran web/Screenshot 2026-05-19 171539.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171554.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171612.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171637.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171644.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171653.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171701.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171713.png',
                    'assets/projects/restoran web/Screenshot 2026-05-19 171725.png',
                ],
                'video'          => 'assets/projects/restoran web/Screen Recording 2026-05-19 171859.mp4',
                'technologies'   => 'Laravel, Bootstrap, MySQL, JavaScript',
                'technologies_en' => 'Laravel, Bootstrap, MySQL, JavaScript',
                'technologies_ar' => 'Laravel، Bootstrap، MySQL، JavaScript',
                'is_active'      => true,
                'order'          => 6,
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
