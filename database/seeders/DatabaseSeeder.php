<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProjectCategorySeeder::class,
            ServiceSeeder::class,
            PricingPackageSeeder::class,
            ProjectSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            SiteSettingSeeder::class,
        ]);
    }
}
