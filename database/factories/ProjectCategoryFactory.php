<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectCategory>
 */
class ProjectCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nameEn = fake()->randomElement(['Websites', 'Business Systems', 'Mobile Apps', 'E-commerce']);
        $nameAr = match($nameEn) {
            'Websites' => 'مواقع الويب',
            'Business Systems' => 'أنظمة الأعمال',
            'Mobile Apps' => 'تطبيقات الجوال',
            'E-commerce' => 'التجارة الإلكترونية',
        };

        return [
            'name_en' => $nameEn,
            'name_ar' => $nameAr,
            'slug' => strtolower(str_replace(' ', '-', $nameEn)),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 10),
        ];
    }
}
