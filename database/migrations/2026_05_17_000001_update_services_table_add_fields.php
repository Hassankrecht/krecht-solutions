<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->renameColumn('order', 'sort_order');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->text('short_description')->nullable()->after('title');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('short_description');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->renameColumn('title', 'name');
            $table->renameColumn('sort_order', 'order');
        });
    }
};
