<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(2, true);
        
        return [
            'title' => $title,
            'title_en' => $title,
            'title_ar' => $title,
            'short_description' => fake()->sentence(),
            'short_description_en' => fake()->sentence(),
            'short_description_ar' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'description_en' => fake()->paragraph(),
            'description_ar' => fake()->paragraph(),
            'icon' => fake()->randomElement(['bi-window-stack', 'bi-phone-landscape', 'bi-layout-sidebar', 'bi-braces-asterisk', 'bi-receipt-cutoff', 'bi-graph-up-arrow', 'bi-qr-code-scan', 'bi-wrench-adjustable-circle']),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 100),
        ];
    }
}
