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
                'title'             => 'Website Development',
                'short_description' => 'Responsive, fast, and secure websites tailored to your business needs.',
                'description'       => 'Custom website development using modern technologies like Laravel, React, and Bootstrap. We create responsive, fast, and secure websites tailored to your business needs.',
                'icon'              => 'bi bi-window-stack',
                'is_active'         => true,
                'sort_order'        => 1,
            ],
            [
                'title'             => 'Flutter Mobile Applications',
                'short_description' => 'Cross-platform mobile apps for iOS and Android from a single codebase.',
                'description'       => 'Cross-platform mobile app development using Flutter. Build beautiful, native-compiled applications for mobile, web, and desktop from a single codebase.',
                'icon'              => 'bi bi-phone-landscape',
                'is_active'         => true,
                'sort_order'        => 2,
            ],
            [
                'title'             => 'Laravel Dashboards',
                'short_description' => 'Feature-rich admin dashboards and management systems built with Laravel.',
                'description'       => 'Powerful admin dashboards and management systems built with Laravel. Feature-rich, secure, and scalable solutions for your business operations.',
                'icon'              => 'bi bi-layout-sidebar',
                'is_active'         => true,
                'sort_order'        => 3,
            ],
            [
                'title'             => 'API Development',
                'short_description' => 'Robust, secure, and well-documented APIs for your applications.',
                'description'       => 'RESTful API development and integration. Build robust, secure, and well-documented APIs for your applications and third-party integrations.',
                'icon'              => 'bi bi-braces-asterisk',
                'is_active'         => true,
                'sort_order'        => 4,
            ],
            [
                'title'             => 'POS Systems',
                'short_description' => 'Complete POS solutions with inventory, sales tracking, and reporting.',
                'description'       => 'Point of Sale systems for retail and hospitality businesses. Complete inventory management, sales tracking, and reporting capabilities.',
                'icon'              => 'bi bi-receipt-cutoff',
                'is_active'         => true,
                'sort_order'        => 5,
            ],
            [
                'title'             => 'Stock & Accounting Systems',
                'short_description' => 'Track inventory, manage finances, and generate detailed business reports.',
                'description'       => 'Comprehensive stock management and accounting solutions. Track inventory, manage finances, and generate detailed reports for your business.',
                'icon'              => 'bi bi-graph-up-arrow',
                'is_active'         => true,
                'sort_order'        => 6,
            ],
            [
                'title'             => 'QR Menu Systems',
                'short_description' => 'Contactless digital menus for restaurants and cafes.',
                'description'       => 'Digital QR code menu systems for restaurants and cafes. Easy-to-use, contactless ordering solutions that enhance customer experience.',
                'icon'              => 'bi bi-qr-code-scan',
                'is_active'         => true,
                'sort_order'        => 7,
            ],
            [
                'title'             => 'Technical Support & Maintenance',
                'short_description' => 'Expert support to keep your systems running smoothly 24/7.',
                'description'       => 'Ongoing technical support and maintenance services. Keep your systems running smoothly with our expert support team available 24/7.',
                'icon'              => 'bi bi-wrench-adjustable-circle',
                'is_active'         => true,
                'sort_order'        => 8,
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
