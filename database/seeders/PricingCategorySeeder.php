<?php

namespace Database\Seeders;

use App\Models\PricingCategory;
use Illuminate\Database\Seeder;

class PricingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_en' => 'Web Solutions',
                'name_ar' => 'حلول الويب',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name_en' => 'Mobile Applications',
                'name_ar' => 'تطبيقات الجوال',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name_en' => 'POS & Business Systems',
                'name_ar' => 'نقاط البيع والأنظمة التجارية',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name_en' => 'Support & Maintenance',
                'name_ar' => 'الدعم والصيانة',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        PricingCategory::query()->delete();

        foreach ($categories as $category) {
            PricingCategory::create($category);
        }
    }
}
