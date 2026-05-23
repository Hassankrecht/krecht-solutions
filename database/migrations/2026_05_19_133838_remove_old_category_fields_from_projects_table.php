<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('category');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('category_en');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('category_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->json('category')->nullable();
            $table->json('category_en')->nullable();
            $table->json('category_ar')->nullable();
        });
    }
};
