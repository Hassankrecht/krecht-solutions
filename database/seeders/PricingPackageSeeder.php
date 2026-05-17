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
                'name' => 'Starter Package',
                'price' => '$499',
                'features' => [
                    'Landing page',
                    'Responsive design',
                    'Contact form',
                    'Basic SEO optimization',
                    'Mobile-friendly',
                    '1 month support',
                ],
                'is_featured' => false,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Business Package',
                'price' => '$1,499',
                'features' => [
                    'Multi-page website (5-10 pages)',
                    'Admin dashboard',
                    'Authentication system',
                    'API integration',
                    'Advanced SEO',
                    '3 months support',
                    'Performance optimization',
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Enterprise Package',
                'price' => '$4,999',
                'features' => [
                    'Custom business system',
                    'Mobile application (Flutter)',
                    'Advanced dashboard',
                    'RESTful APIs and database',
                    '6 months maintenance and support',
                    'Custom integrations',
                    'Priority support',
                    'Training sessions',
                ],
                'is_featured' => false,
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($packages as $package) {
            PricingPackage::updateOrCreate(
                ['name' => $package['name']],
                $package
            );
        }
    }
}
