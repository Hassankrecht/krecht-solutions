<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title_en')->nullable()->after('title');
            $table->string('title_ar')->nullable()->after('title_en');
            $table->text('description_en')->nullable()->after('description');
            $table->text('description_ar')->nullable()->after('description_en');
            $table->string('category_en')->nullable()->after('category');
            $table->string('category_ar')->nullable()->after('category_en');
            $table->json('technologies_en')->nullable()->after('technologies');
            $table->json('technologies_ar')->nullable()->after('technologies_en');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['title_en', 'title_ar', 'description_en', 'description_ar', 'category_en', 'category_ar', 'technologies_en', 'technologies_ar']);
        });
    }
};
