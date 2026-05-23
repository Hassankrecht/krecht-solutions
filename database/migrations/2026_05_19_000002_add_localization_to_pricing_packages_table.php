<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pricing_packages', function (Blueprint $table) {
            $table->string('name_en')->nullable()->after('name');
            $table->string('name_ar')->nullable()->after('name_en');
            $table->string('category_en')->nullable()->after('category');
            $table->string('category_ar')->nullable()->after('category_en');
            $table->json('features_en')->nullable()->after('features');
            $table->json('features_ar')->nullable()->after('features_en');
        });
    }

    public function down(): void
    {
        Schema::table('pricing_packages', function (Blueprint $table) {
            $table->dropColumn('name_en');
        });

        Schema::table('pricing_packages', function (Blueprint $table) {
            $table->dropColumn('name_ar');
        });

        Schema::table('pricing_packages', function (Blueprint $table) {
            $table->dropColumn('category_en');
        });

        Schema::table('pricing_packages', function (Blueprint $table) {
            $table->dropColumn('category_ar');
        });

        Schema::table('pricing_packages', function (Blueprint $table) {
            $table->dropColumn('features_en');
        });

        Schema::table('pricing_packages', function (Blueprint $table) {
            $table->dropColumn('features_ar');
        });
    }
};
