<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'                  => 'Website Development',
                'title_en'               => 'Website Development',
                'title_ar'               => 'تطوير المواقع الإلكترونية',
                'short_description'      => 'Responsive, fast, and secure websites tailored to your business needs.',
                'short_description_en'   => 'Responsive, fast, and secure websites tailored to your business needs.',
                'short_description_ar'   => 'مواقع ويب متجاوبة وسريعة وآمنة مصممة خصيصًا لاحتياجات عملك.',
                'description'            => 'Custom website development using modern technologies like Laravel, React, and Bootstrap. We create responsive, fast, and secure websites tailored to your business needs.',
                'description_en'         => 'Custom website development using modern technologies like Laravel, React, and Bootstrap. We create responsive, fast, and secure websites tailored to your business needs.',
                'description_ar'         => 'تطوير مواقع ويب مخصصة باستخدام تقنيات حديثة مثل Laravel و React و Bootstrap. نقوم بإنشاء مواقع ويب متجاوبة وسريعة وآمنة مصممة خصيصًا لاحتياجات عملك.',
                'icon'                   => 'bi bi-window-stack',
                'is_active'              => true,
                'sort_order'             => 1,
            ],
            [
                'title'                  => 'Flutter Mobile Applications',
                'title_en'               => 'Flutter Mobile Applications',
                'title_ar'               => 'تطبيقات الهاتف المحمول Flutter',
                'short_description'      => 'Cross-platform mobile apps for iOS and Android from a single codebase.',
                'short_description_en'   => 'Cross-platform mobile apps for iOS and Android from a single codebase.',
                'short_description_ar'   => 'تطبيقات الهاتف المحمول متعددة المنصات لنظام iOS و Android من قاعدة برمجية واحدة.',
                'description'            => 'Cross-platform mobile app development using Flutter. Build beautiful, native-compiled applications for mobile, web, and desktop from a single codebase.',
                'description_en'         => 'Cross-platform mobile app development using Flutter. Build beautiful, native-compiled applications for mobile, web, and desktop from a single codebase.',
                'description_ar'         => 'تطوير تطبيقات الهاتف المحمول متعددة المنصات باستخدام Flutter. قم ببناء تطبيقات أصلية جميلة ومجمعة للهاتف المحمول والويب وسطح المكتب من قاعدة برمجية واحدة.',
                'icon'                   => 'bi bi-phone-landscape',
                'is_active'              => true,
                'sort_order'             => 2,
            ],
            [
                'title'                  => 'Laravel Dashboards',
                'title_en'               => 'Laravel Dashboards',
                'title_ar'               => 'لوحات تحكم Laravel',
                'short_description'      => 'Feature-rich admin dashboards and management systems built with Laravel.',
                'short_description_en'   => 'Feature-rich admin dashboards and management systems built with Laravel.',
                'short_description_ar'   => 'لوحات تحكم وأنظمة إدارة غنية بالميزات مبنيّة باستخدام Laravel.',
                'description'            => 'Powerful admin dashboards and management systems built with Laravel. Feature-rich, secure, and scalable solutions for your business operations.',
                'description_en'         => 'Powerful admin dashboards and management systems built with Laravel. Feature-rich, secure, and scalable solutions for your business operations.',
                'description_ar'         => 'لوحات تحكم وأنظمة إدارة قوية مبنيّة باستخدام Laravel. حلول غنية بالميزات وآمنة وقابلة للتوسع لعمليات عملك.',
                'icon'                   => 'bi bi-layout-sidebar',
                'is_active'              => true,
                'sort_order'             => 3,
            ],
            [
                'title'                  => 'API Development',
                'title_en'               => 'API Development',
                'title_ar'               => 'تطوير واجهات برمجة التطبيقات',
                'short_description'      => 'Robust, secure, and well-documented APIs for your applications.',
                'short_description_en'   => 'Robust, secure, and well-documented APIs for your applications.',
                'short_description_ar'   => 'واجهات برمجة تطبيقات قوية وآمنة وموثقة جيدًا لتطبيقاتك.',
                'description'            => 'RESTful API development and integration. Build robust, secure, and well-documented APIs for your applications and third-party integrations.',
                'description_en'         => 'RESTful API development and integration. Build robust, secure, and well-documented APIs for your applications and third-party integrations.',
                'description_ar'         => 'تطوير وتكامل واجهات برمجة تطبيقات RESTful. قم ببناء واجهات برمجة تطبيقات قوية وآمنة وموثقة جيدًا لتطبيقاتك والتكامل مع الجهات الخارجية.',
                'icon'                   => 'bi bi-braces-asterisk',
                'is_active'              => true,
                'sort_order'             => 4,
            ],
            [
                'title'                  => 'POS Systems',
                'title_en'               => 'POS Systems',
                'title_ar'               => 'أنظمة نقاط البيع',
                'short_description'      => 'Complete POS solutions with inventory, sales tracking, and reporting.',
                'short_description_en'   => 'Complete POS solutions with inventory, sales tracking, and reporting.',
                'short_description_ar'   => 'حلول نقاط بيع كاملة مع إدارة المخزون وتتبع المبيعات وإعداد التقارير.',
                'description'            => 'Point of Sale systems for retail and hospitality businesses. Complete inventory management, sales tracking, and reporting capabilities.',
                'description_en'         => 'Point of Sale systems for retail and hospitality businesses. Complete inventory management, sales tracking, and reporting capabilities.',
                'description_ar'         => 'أنظمة نقاط البيع للتجزئة وضيافة الأعمال. إدارة مخزون كاملة وتتبع المبيعات وقدرات إعداد التقارير.',
                'icon'                   => 'bi bi-receipt-cutoff',
                'is_active'              => true,
                'sort_order'             => 5,
            ],
            [
                'title'                  => 'Stock & Accounting Systems',
                'title_en'               => 'Stock & Accounting Systems',
                'title_ar'               => 'أنظمة المخزون والمحاسبة',
                'short_description'      => 'Track inventory, manage finances, and generate detailed business reports.',
                'short_description_en'   => 'Track inventory, manage finances, and generate detailed business reports.',
                'short_description_ar'   => 'تتبع المخزون وإدارة الشؤون المالية وإنشاء تقارير تفصيلية للشركات.',
                'description'            => 'Comprehensive stock management and accounting solutions. Track inventory, manage finances, and generate detailed reports for your business.',
                'description_en'         => 'Comprehensive stock management and accounting solutions. Track inventory, manage finances, and generate detailed reports for your business.',
                'description_ar'         => 'حلول شاملة لإدارة المخزون والمحاسبة. تتبع المخزون وإدارة الشؤون المالية وإنشاء تقارير تفصيلية لعملك.',
                'icon'                   => 'bi bi-graph-up-arrow',
                'is_active'              => true,
                'sort_order'             => 6,
            ],
            [
                'title'                  => 'QR Menu Systems',
                'title_en'               => 'QR Menu Systems',
                'title_ar'               => 'أنظمة القوائم QR',
                'short_description'      => 'Contactless digital menus for restaurants and cafes.',
                'short_description_en'   => 'Contactless digital menus for restaurants and cafes.',
                'short_description_ar'   => 'قوائم رقمية بدون تلامس للمطاعم والمقاهي.',
                'description'            => 'Digital QR code menu systems for restaurants and cafes. Easy-to-use, contactless ordering solutions that enhance customer experience.',
                'description_en'         => 'Digital QR code menu systems for restaurants and cafes. Easy-to-use, contactless ordering solutions that enhance customer experience.',
                'description_ar'         => 'أنظمة القوائم الرقمية برمز QR للمطاعم والمقاهي. حلول طلب سهلة الاستخدام بدون تلامس تعزز تجربة العملاء.',
                'icon'                   => 'bi bi-qr-code-scan',
                'is_active'              => true,
                'sort_order'             => 7,
            ],
            [
                'title'                  => 'Technical Support & Maintenance',
                'title_en'               => 'Technical Support & Maintenance',
                'title_ar'               => 'الدعم الفني والصيانة',
                'short_description'      => 'Expert support to keep your systems running smoothly 24/7.',
                'short_description_en'   => 'Expert support to keep your systems running smoothly 24/7.',
                'short_description_ar'   => 'دعم خبير للحفاظ على أنظمتك تعمل بسلاسة على مدار الساعة.',
                'description'            => 'Ongoing technical support and maintenance services. Keep your systems running smoothly with our expert support team available 24/7.',
                'description_en'         => 'Ongoing technical support and maintenance services. Keep your systems running smoothly with our expert support team available 24/7.',
                'description_ar'         => 'خدمات الدعم الفني والصيانة المستمرة. احتفظ بأنظمتك تعمل بسلاسة مع فريق الدعم الخبير لدينا المتاح على مدار الساعة.',
                'icon'                   => 'bi bi-wrench-adjustable-circle',
                'is_active'              => true,
                'sort_order'             => 8,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}
