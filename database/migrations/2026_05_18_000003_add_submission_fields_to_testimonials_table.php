<?php

use App\Models\Testimonial;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (! Schema::hasColumn('testimonials', 'email')) {
                $table->string('email')->nullable()->after('company');
            }

            if (! Schema::hasColumn('testimonials', 'status')) {
                $table->string('status')->default(Testimonial::STATUS_APPROVED)->after('image');
            }

            if (! Schema::hasColumn('testimonials', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('order');
            }
        });

        DB::table('testimonials')
            ->whereIn('name', ['John Smith', 'Sarah Johnson', 'Michael Chen', 'Emily Davis'])
            ->update([
                'status' => Testimonial::STATUS_REJECTED,
                'is_active' => false,
            ]);
    }

    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'email')) {
                $table->dropColumn('email');
            }

            if (Schema::hasColumn('testimonials', 'status')) {
                $table->dropColumn('status');
            }

            if (Schema::hasColumn('testimonials', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }
};
