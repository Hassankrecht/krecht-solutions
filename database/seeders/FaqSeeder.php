<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What technologies do you use for web development?',
                'answer' => 'We primarily use Laravel for backend development, combined with modern frontend technologies like React, Vue.js, and Bootstrap 5. This ensures your website is fast, secure, and scalable.',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'question' => 'Do you provide ongoing support and maintenance?',
                'answer' => 'Yes, we offer comprehensive support and maintenance packages. Our team is available to handle updates, bug fixes, and technical support to ensure your systems run smoothly.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'question' => 'How long does it take to complete a project?',
                'answer' => 'Project timelines vary based on complexity. A simple landing page may take 1-2 weeks, while complex business systems can take 2-4 months. We provide detailed timelines during our initial consultation.',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'question' => 'Can you integrate with existing systems?',
                'answer' => 'Absolutely! We specialize in API development and can integrate our solutions with your existing systems, third-party services, and legacy applications seamlessly.',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'question' => 'Do you offer mobile app development?',
                'answer' => 'Yes, we develop cross-platform mobile applications using Flutter. This allows us to build apps that work on both iOS and Android from a single codebase, saving time and cost.',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'question' => 'What is your pricing structure?',
                'answer' => 'We offer flexible pricing packages including Starter, Business, and Enterprise plans. Each package is designed to meet different business needs and budgets. Contact us for a custom quote.',
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                $faq
            );
        }
    }
}
