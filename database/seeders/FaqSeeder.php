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
                'question_en' => 'What technologies do you build with?',
                'question_ar' => 'ما هي التقنيات التي تستخدمونها في البناء؟',
                'answer' => 'We specialise in Laravel for backend and web applications, and Flutter for cross-platform mobile apps. We also work with MySQL, REST APIs, Bootstrap, and Vue.js — chosen for reliability, performance, and long-term maintainability.',
                'answer_en' => 'We specialise in Laravel for backend and web applications, and Flutter for cross-platform mobile apps. We also work with MySQL, REST APIs, Bootstrap, and Vue.js — chosen for reliability, performance, and long-term maintainability.',
                'answer_ar' => 'نتخصص في Laravel للواجهة الخلفية وتطبيقات الويب، و Flutter لتطبيقات الجوال متعددة المنصات. نعمل أيضًا مع MySQL و REST APIs و Bootstrap و Vue.js — تم اختيارها للموثوقية والأداء والقابلية للصيانة على المدى الطويل.',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'question' => 'How long does a typical project take?',
                'question_en' => 'How long does a typical project take?',
                'question_ar' => 'كم يستغرق المشروع النموذجي؟',
                'answer' => 'Timelines depend on scope. A focused landing page or simple system is typically 1–2 weeks, while a full business dashboard or mobile app runs 4–10 weeks. We provide a detailed estimate after our initial discovery session.',
                'answer_en' => 'Timelines depend on scope. A focused landing page or simple system is typically 1–2 weeks, while a full business dashboard or mobile app runs 4–10 weeks. We provide a detailed estimate after our initial discovery session.',
                'answer_ar' => 'تعتمد الجداول الزمنية على النطاق. عادة ما تستغرق صفحة الهبوط المركزة أو النظام البسيط 1-2 أسبوعًا، بينما تستغرق لوحة تحكم الأعمال الكاملة أو تطبيق الجوال 4-10 أسابيع. نقدم تقديرًا تفصيليًا بعد جلسة الاكتشاف الأولية.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'question' => 'Can you build a custom dashboard or admin panel?',
                'question_en' => 'Can you build a custom dashboard or admin panel?',
                'question_ar' => 'هل يمكنك بناء لوحة تحكم أو لوحة مسؤول مخصصة؟',
                'answer' => 'Yes. We build role-based admin dashboards tailored to your workflow — including reporting, data management, user permissions, and real-time analytics. Every dashboard is built custom, not from a generic template.',
                'answer_en' => 'Yes. We build role-based admin dashboards tailored to your workflow — including reporting, data management, user permissions, and real-time analytics. Every dashboard is built custom, not from a generic template.',
                'answer_ar' => 'نعم. نبني لوحات تحكم للمسؤولين بناءً على الأدوار مصممة خصيصًا لسير عملك — بما في ذلك التقارير وإدارة البيانات وأذونات المستخدم والتحليلات في الوقت الفعلي. كل لوحة تحكم مبنية بشكل مخصص، وليس من قالب عام.',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'question' => 'Do you provide support after the project launches?',
                'question_en' => 'Do you provide support after the project launches?',
                'question_ar' => 'هل تقدمون الدعم بعد إطلاق المشروع؟',
                'answer' => 'Absolutely. We offer ongoing maintenance and support packages covering bug fixes, feature updates, performance monitoring, and security patches — so your system stays reliable as your business grows.',
                'answer_en' => 'Absolutely. We offer ongoing maintenance and support packages covering bug fixes, feature updates, performance monitoring, and security patches — so your system stays reliable as your business grows.',
                'answer_ar' => 'بالتأكيد. نقدم حزم الصيانة والدعم المستمر التي تغطي إصلاح الأخطاء وتحديثات الميزات ومراقبة الأداء وتصحيحات الأمان — لكي يظل نظامك موثوقًا مع نمو عملك.',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'question' => 'Can you integrate with our existing systems or third-party APIs?',
                'question_en' => 'Can you integrate with our existing systems or third-party APIs?',
                'question_ar' => 'هل يمكنك التكامل مع أنظمتنا الحالية أو واجهات برمجة تطبيقات الطرف الثالث؟',
                'answer' => 'Yes. API integration is a core part of what we do — whether connecting to payment gateways, ERP platforms, logistics providers, or any REST-based service. We can also build the API layer that your mobile app or external partners consume.',
                'answer_en' => 'Yes. API integration is a core part of what we do — whether connecting to payment gateways, ERP platforms, logistics providers, or any REST-based service. We can also build the API layer that your mobile app or external partners consume.',
                'answer_ar' => 'نعم. تكوين واجهة برمجة التطبيقات هو جزء أساسي مما نقوم به — سواء كان الاتصال ببوابات الدفع أو منصات ERP أو مقدمي الخدمات اللوجستية أو أي خدمة تعتمد على REST. يمكننا أيضًا بناء طبقة واجهة برمجة التطبيقات التي يستهلكها تطبيق الجوال أو الشركاء الخارجيون.',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'question' => 'Do you build mobile apps for both iOS and Android?',
                'question_en' => 'Do you build mobile apps for both iOS and Android?',
                'question_ar' => 'هل تبني تطبيقات جوال لنظامي iOS و Android؟',
                'answer' => 'We use Flutter to deliver a single, high-quality codebase that runs natively on both iOS and Android. This reduces development time and cost while ensuring a consistent, polished user experience across all devices.',
                'answer_en' => 'We use Flutter to deliver a single, high-quality codebase that runs natively on both iOS and Android. This reduces development time and cost while ensuring a consistent, polished user experience across all devices.',
                'answer_ar' => 'نستخدم Flutter لتقديم قاعدة برمجية واحدة عالية الجودة تعمل بشكل أصلي على كل من iOS و Android. هذا يقلل من وقت التطوير والتكلفة مع ضمان تجربة مستخدم متسقة ومصقولة عبر جميع الأجهزة.',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'question' => 'What does your development process look like?',
                'question_en' => 'What does your development process look like?',
                'question_ar' => 'كيف يبدو عملية التطوير لديكم؟',
                'answer' => 'We follow a structured process: discovery and requirements, wireframing and design sign-off, iterative development with regular client updates, thorough testing, then deployment and handover. You stay informed and in control at every stage.',
                'answer_en' => 'We follow a structured process: discovery and requirements, wireframing and design sign-off, iterative development with regular client updates, thorough testing, then deployment and handover. You stay informed and in control at every stage.',
                'answer_ar' => 'نتبع عملية منظمة: الاكتشاف والمتطلبات، والتصميم الأولي والموافقة على التصميم، والتطوير التكراري مع تحديثات منتظمة للعميل، والاختبار الشامل، ثم النشر والتسليم. تظل على علم وفي السيطرة في كل مرحلة.',
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
