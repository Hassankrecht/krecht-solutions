<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $question = fake()->sentence() . '?';
        
        return [
            'question' => $question,
            'question_en' => $question,
            'question_ar' => $question,
            'answer' => fake()->paragraph(),
            'answer_en' => fake()->paragraph(),
            'answer_ar' => fake()->paragraph(),
            'is_active' => true,
            'order' => fake()->numberBetween(1, 100),
        ];
    }
}
