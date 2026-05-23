<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('position_en')->nullable()->after('position');
            $table->string('position_ar')->nullable()->after('position_en');
            $table->string('company_en')->nullable()->after('company');
            $table->string('company_ar')->nullable()->after('company_en');
            $table->text('content_en')->nullable()->after('content');
            $table->text('content_ar')->nullable()->after('content_en');
        });
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('position_en');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('position_ar');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('company_en');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('company_ar');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('content_en');
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('content_ar');
        });
    }
};
