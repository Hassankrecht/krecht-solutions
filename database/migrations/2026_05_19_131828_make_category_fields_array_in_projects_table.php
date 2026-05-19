<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, convert existing string values to JSON arrays
        DB::statement("UPDATE projects SET category = JSON_ARRAY(category) WHERE category IS NOT NULL");
        DB::statement("UPDATE projects SET category_en = JSON_ARRAY(category_en) WHERE category_en IS NOT NULL");
        DB::statement("UPDATE projects SET category_ar = JSON_ARRAY(category_ar) WHERE category_ar IS NOT NULL");

        Schema::table('projects', function (Blueprint $table) {
            $table->json('category')->nullable()->change();
            $table->json('category_en')->nullable()->change();
            $table->json('category_ar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('category')->nullable()->change();
            $table->string('category_en')->nullable()->change();
            $table->string('category_ar')->nullable()->change();
        });
    }
};
