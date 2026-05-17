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
                'title' => 'E-Commerce Platform',
                'description' => 'Full-featured online store with payment integration and inventory management.',
                'category' => 'Websites',
                'image' => 'assets/img/portfolio/portfolio-1.webp',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Food Delivery App',
                'description' => 'Cross-platform mobile app for food ordering and delivery tracking.',
                'category' => 'Mobile Apps',
                'image' => 'assets/img/portfolio/portfolio-portrait-1.webp',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Business Analytics Dashboard',
                'description' => 'Real-time analytics dashboard for business performance monitoring.',
                'category' => 'Dashboards',
                'image' => 'assets/img/portfolio/portfolio-3.webp',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Retail POS System',
                'description' => 'Complete point of sale system for retail stores with barcode scanning.',
                'category' => 'POS Systems',
                'image' => 'assets/img/portfolio/portfolio-4.webp',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'title' => 'Inventory Management System',
                'description' => 'Advanced stock tracking and warehouse management solution.',
                'category' => 'Business Systems',
                'image' => 'assets/img/portfolio/portfolio-portrait-2.webp',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'title' => 'Corporate Website',
                'description' => 'Professional corporate website with CMS and multilingual support.',
                'category' => 'Websites',
                'image' => 'assets/img/portfolio/portfolio-portrait-3.webp',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'title' => 'Healthcare App',
                'description' => 'Patient management and appointment scheduling mobile application.',
                'category' => 'Mobile Apps',
                'image' => 'assets/img/portfolio/portfolio-7.webp',
                'is_active' => true,
                'order' => 7,
            ],
            [
                'title' => 'Restaurant POS',
                'description' => 'Specialized POS system for restaurants with table management.',
                'category' => 'POS Systems',
                'image' => 'assets/img/portfolio/portfolio-8.webp',
                'is_active' => true,
                'order' => 8,
            ],
            [
                'title' => 'Accounting Software',
                'description' => 'Comprehensive accounting and financial reporting system.',
                'category' => 'Business Systems',
                'image' => 'assets/img/portfolio/portfolio-9.webp',
                'is_active' => true,
                'order' => 9,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['title' => $project['title']],
                $project
            );
        }
    }
}
