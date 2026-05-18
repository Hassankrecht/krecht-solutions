<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'position' => fake()->optional()->jobTitle(),
            'position_en' => fake()->optional()->jobTitle(),
            'position_ar' => fake()->optional()->jobTitle(),
            'company' => fake()->optional()->company(),
            'company_en' => fake()->optional()->company(),
            'company_ar' => fake()->optional()->company(),
            'email' => fake()->safeEmail(),
            'content' => fake()->paragraph(),
            'content_en' => fake()->paragraph(),
            'content_ar' => fake()->paragraph(),
            'rating' => fake()->numberBetween(1, 5),
            'image' => fake()->optional()->imageUrl(),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'is_active' => fake()->boolean(),
            'order' => fake()->numberBetween(1, 100),
            'sort_order' => fake()->numberBetween(1, 100),
        ];
    }
}
