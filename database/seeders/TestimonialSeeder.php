<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'John Smith',
                'position' => 'CEO',
                'company' => 'TechStart Inc.',
                'content' => 'Krecht Solutions delivered an exceptional e-commerce platform that exceeded our expectations. Their team was professional, responsive, and delivered on time. Highly recommended!',
                'rating' => 5,
                'image' => 'assets/img/person/person-m-9.webp',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Sarah Johnson',
                'position' => 'Operations Manager',
                'company' => 'RetailMax',
                'content' => 'The POS system they developed for us has transformed our business operations. Inventory tracking is now seamless, and sales reporting is incredibly detailed.',
                'rating' => 5,
                'image' => 'assets/img/person/person-f-8.webp',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Michael Chen',
                'position' => 'Founder',
                'company' => 'FoodieApp',
                'content' => 'Our Flutter mobile app was built to perfection. The user experience is smooth, and the app performs flawlessly across all devices. Great work!',
                'rating' => 5,
                'image' => 'assets/img/person/person-m-6.webp',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Emily Davis',
                'position' => 'Director',
                'company' => 'HealthCare Plus',
                'content' => 'The dashboard they created for our healthcare facility has improved our efficiency significantly. Real-time data access has been a game-changer for our team.',
                'rating' => 5,
                'image' => 'assets/img/person/person-f-4.webp',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name'], 'company' => $testimonial['company']],
                $testimonial
            );
        }
    }
}
