<?php

use App\Models\PricingPackage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('pricing_packages', 'category')) {
            Schema::table('pricing_packages', function (Blueprint $table) {
                $table->string('category')->default(PricingPackage::CATEGORY_WEB)->after('name');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('pricing_packages', 'category')) {
            Schema::table('pricing_packages', function (Blueprint $table) {
                $table->dropColumn('category');
            });
        }
    }
};
