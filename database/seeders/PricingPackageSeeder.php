<?php

namespace Database\Seeders;

use App\Models\PricingPackage;
use Illuminate\Database\Seeder;

class PricingPackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name' => 'Starter Website',
                'category' => PricingPackage::CATEGORY_WEB,
                'price' => 'Starting from $299',
                'features' => [
                    'Responsive website',
                    'Contact form',
                    'WhatsApp integration',
                    'Basic SEO',
                    'Mobile-friendly design',
                    '14 days support included',
                ],
                'is_featured' => false,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Business Website + Dashboard',
                'category' => PricingPackage::CATEGORY_WEB,
                'price' => 'Starting from $999',
                'features' => [
                    'Multi-page website',
                    'Admin dashboard',
                    'Authentication system',
                    'API integration',
                    'CMS/content management',
                    'Analytics/dashboard',
                    'Responsive design',
                    '30 days support included',
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Complete Digital Solution',
                'category' => PricingPackage::CATEGORY_WEB,
                'price' => 'Starting from $3,000+',
                'features' => [
                    'Website',
                    'Online dashboard',
                    'Advanced APIs',
                    'Business automation',
                    'Multi-user system',
                    'Reporting system',
                    'Cloud-ready architecture',
                    '60 days support included',
                ],
                'is_featured' => false,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Starter Mobile App',
                'category' => PricingPackage::CATEGORY_MOBILE,
                'price' => 'Starting from $699',
                'features' => [
                    'Flutter app',
                    'Authentication',
                    'API integration',
                    'Android support',
                    'Modern UI',
                    '14 days support included',
                ],
                'is_featured' => false,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Business Mobile App',
                'category' => PricingPackage::CATEGORY_MOBILE,
                'price' => 'Starting from $1,500',
                'features' => [
                    'Advanced Flutter app',
                    'Dashboard integration',
                    'Push notifications',
                    'APIs',
                    'User management',
                    'Modern UI/UX',
                    '30 days support included',
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Full Mobile + Web Platform',
                'category' => PricingPackage::CATEGORY_MOBILE,
                'price' => 'Starting from $4,000+',
                'features' => [
                    'Flutter app',
                    'Website',
                    'Online dashboard',
                    'Cloud sync',
                    'APIs',
                    'Notifications',
                    'Admin management',
                    '60 days support included',
                ],
                'is_featured' => false,
                'is_active' => true,
                'order' => 6,
            ],
            [
                'name' => 'Local POS System',
                'category' => PricingPackage::CATEGORY_POS,
                'price' => 'Coming Soon',
                'features' => [],
                'is_featured' => false,
                'is_active' => true,
                'order' => 7,
            ],
            [
                'name' => 'POS + Stock Management',
                'category' => PricingPackage::CATEGORY_POS,
                'price' => 'Coming Soon',
                'features' => [],
                'is_featured' => false,
                'is_active' => true,
                'order' => 8,
            ],
            [
                'name' => 'Full Accounting & ERP System',
                'category' => PricingPackage::CATEGORY_POS,
                'price' => 'Coming Soon',
                'features' => [],
                'is_featured' => false,
                'is_active' => true,
                'order' => 9,
            ],
            [
                'name' => 'Basic Maintenance',
                'category' => PricingPackage::CATEGORY_SUPPORT,
                'price' => '$50/month',
                'features' => [],
                'is_featured' => false,
                'is_active' => true,
                'order' => 10,
            ],
            [
                'name' => 'Business Maintenance',
                'category' => PricingPackage::CATEGORY_SUPPORT,
                'price' => '$150/month',
                'features' => [],
                'is_featured' => true,
                'is_active' => true,
                'order' => 11,
            ],
            [
                'name' => 'Enterprise Support',
                'category' => PricingPackage::CATEGORY_SUPPORT,
                'price' => 'Custom Quote',
                'features' => [],
                'is_featured' => false,
                'is_active' => true,
                'order' => 12,
            ],
        ];

        PricingPackage::query()->delete();

        foreach ($packages as $package) {
            PricingPackage::create($package);
        }
    }
}
