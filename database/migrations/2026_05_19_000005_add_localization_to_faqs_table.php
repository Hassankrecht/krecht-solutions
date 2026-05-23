<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('question_en')->nullable()->after('question');
            $table->string('question_ar')->nullable()->after('question_en');
            $table->text('answer_en')->nullable()->after('answer');
            $table->text('answer_ar')->nullable()->after('answer_en');
        });
    }

    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('question_en');
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('question_ar');
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('answer_en');
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('answer_ar');
        });
    }
};
