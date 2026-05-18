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
                'value' => 'Krecht Solutions',
                'type' => 'text',
            ],
            [
                'key' => 'site_tagline',
                'value' => 'Custom Software Solutions for Modern Businesses',
                'type' => 'text',
            ],
            [
                'key' => 'site_description',
                'value' => 'Professional software development and IT services including web development, mobile apps, dashboards, and business systems.',
                'type' => 'text',
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@krecht-solutions.com',
                'type' => 'text',
            ],
            [
                'key' => 'contact_phone',
                'value' => '+1 555 123 4567',
                'type' => 'text',
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Business Avenue, Tech City, TC 12345',
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
