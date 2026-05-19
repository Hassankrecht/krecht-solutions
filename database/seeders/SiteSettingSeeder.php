<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'site_name',
                'value' => [
                    'en' => 'Krecht Solutions',
                    'ar' => 'حلول كرشت',
                ],
                'type' => 'text',
            ],
            [
                'key' => 'site_tagline',
                'value' => [
                    'en' => 'Custom Software Solutions for Modern Businesses',
                    'ar' => 'حلول برمجية مخصصة للأعمال الحديثة',
                ],
                'type' => 'text',
            ],
            [
                'key' => 'site_description',
                'value' => [
                    'en' => 'Professional software development and IT services including web development, mobile apps, dashboards, and business systems.',
                    'ar' => 'تطوير برمجيات احترافي وخدمات تكنولوجيا المعلومات بما في ذلك تطوير الويب وتطبيقات الجوال ولوحات التحكم والأنظمة التجارية.',
                ],
                'type' => 'text',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@krecht-solutions.com',
                'type' => 'text',
            ],
            [
                'key' => 'contact_notification_email',
                'value' => env('MAIL_USERNAME', 'info@krecht-solutions.com'),
                'type' => 'text',
            ],
            [
                'key' => 'contact_phone',
                'value' => '78768725',
                'type' => 'text',
            ],
            [
                'key' => 'contact_address',
                'value' => [
                    'en' => 'Sour, Lebanon',
                    'ar' => 'صور، لبنان',
                ],
                'type' => 'text',
            ],
            [
                'key' => 'contact_whatsapp',
                'value' => [
                    'en' => 'Available',
                    'ar' => 'متاح',
                ],
                'type' => 'text',
            ],
            [
                'key' => 'contact_working_hours',
                'value' => [
                    'en' => 'Monday - Sunday, 9:00 AM - 5:00 PM',
                    'ar' => 'الاثنين - الأحد، 9:00 صباحًا - 5:00 مساءً',
                ],
                'type' => 'text',
            ],
            [
                'key' => 'footer_working_hours',
                'value' => [
                    'en' => 'Mon - Sun | 9 AM - 5 PM',
                    'ar' => 'الاثنين - الأحد | 9 ص - 5 م',
                ],
                'type' => 'text',
            ],
            [
                'key' => 'social_links',
                'value' => [
                    'twitter' => 'https://twitter.com/krecht',
                    'facebook' => 'https://facebook.com/krecht',
                    'instagram' => 'https://instagram.com/krecht',
                    'linkedin' => 'https://linkedin.com/company/krecht',
                ],
                'type' => 'json',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
