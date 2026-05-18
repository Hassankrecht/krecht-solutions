<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PricingPackage>
 */
class PricingPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(2, true);
        
        return [
            'name' => $name,
            'name_en' => $name,
            'name_ar' => $name,
            'category' => fake()->randomElement(['Web Solutions', 'Mobile Applications', 'POS & Business Systems', 'Support & Maintenance']),
            'category_en' => fake()->randomElement(['Web Solutions', 'Mobile Applications', 'POS & Business Systems', 'Support & Maintenance']),
            'category_ar' => fake()->randomElement(['Web Solutions', 'Mobile Applications', 'POS & Business Systems', 'Support & Maintenance']),
            'price' => fake()->numberBetween(100, 5000),
            'features' => [fake()->sentence(), fake()->sentence(), fake()->sentence()],
            'features_en' => [fake()->sentence(), fake()->sentence(), fake()->sentence()],
            'features_ar' => [fake()->sentence(), fake()->sentence(), fake()->sentence()],
            'is_featured' => fake()->boolean(),
            'is_active' => true,
            'order' => fake()->numberBetween(1, 100),
        ];
    }
}
