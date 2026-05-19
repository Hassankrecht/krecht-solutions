<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name_en' => 'Websites',
                'name_ar' => 'مواقع الويب',
                'slug' => 'websites',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_en' => 'Business Systems',
                'name_ar' => 'أنظمة الأعمال',
                'slug' => 'business-systems',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_en' => 'Mobile Apps',
                'name_ar' => 'تطبيقات الجوال',
                'slug' => 'mobile-apps',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name_en' => 'E-commerce',
                'name_ar' => 'التجارة الإلكترونية',
                'slug' => 'e-commerce',
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($categories as $category) {
            ProjectCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
