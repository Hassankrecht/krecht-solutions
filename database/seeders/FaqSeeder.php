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
                'question' => 'What technologies do you build with?',
                'answer' => 'We specialise in Laravel for backend and web applications, and Flutter for cross-platform mobile apps. We also work with MySQL, REST APIs, Bootstrap, and Vue.js — chosen for reliability, performance, and long-term maintainability.',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'question' => 'How long does a typical project take?',
                'answer' => 'Timelines depend on scope. A focused landing page or simple system is typically 1–2 weeks, while a full business dashboard or mobile app runs 4–10 weeks. We provide a detailed estimate after our initial discovery session.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'question' => 'Can you build a custom dashboard or admin panel?',
                'answer' => 'Yes. We build role-based admin dashboards tailored to your workflow — including reporting, data management, user permissions, and real-time analytics. Every dashboard is built custom, not from a generic template.',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'question' => 'Do you provide support after the project launches?',
                'answer' => 'Absolutely. We offer ongoing maintenance and support packages covering bug fixes, feature updates, performance monitoring, and security patches — so your system stays reliable as your business grows.',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'question' => 'Can you integrate with our existing systems or third-party APIs?',
                'answer' => 'Yes. API integration is a core part of what we do — whether connecting to payment gateways, ERP platforms, logistics providers, or any REST-based service. We can also build the API layer that your mobile app or external partners consume.',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'question' => 'Do you build mobile apps for both iOS and Android?',
                'answer' => 'We use Flutter to deliver a single, high-quality codebase that runs natively on both iOS and Android. This reduces development time and cost while ensuring a consistent, polished user experience across all devices.',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'question' => 'What does your development process look like?',
                'answer' => 'We follow a structured process: discovery and requirements, wireframing and design sign-off, iterative development with regular client updates, thorough testing, then deployment and handover. You stay informed and in control at every stage.',
                'is_active' => true,
                'order' => 7,
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
