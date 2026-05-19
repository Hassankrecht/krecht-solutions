<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->words(3, true);

        return [
            'title' => $title,
            'title_en' => $title,
            'title_ar' => $title,
            'description' => fake()->paragraph(),
            'description_en' => fake()->paragraph(),
            'description_ar' => fake()->paragraph(),
            'image' => null,
            'gallery_images' => [],
            'video' => null,
            'technologies' => [fake()->word(), fake()->word()],
            'technologies_en' => [fake()->word(), fake()->word()],
            'technologies_ar' => [fake()->word(), fake()->word()],
            'is_active' => true,
            'order' => fake()->numberBetween(1, 100),
        ];
    }
}
