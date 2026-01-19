<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('taxonomy_terms', function (Blueprint $table) {
            $table->id();

            // type examples:
            // category, profession, experience, education, job_type, salary_type, driving_license, seniority, workplace_type
            $table->string('type', 50);
            $table->string('key', 100); // stable key: "it", "construction", "junior", "full_time"

            $table->string('label_en');
            $table->string('label_sk')->nullable();

            $table->boolean('active')->default(true);
            $table->unsignedSmallInteger('sort')->default(0);

            $table->timestamps();

            $table->unique(['type', 'key']);
            $table->index(['type', 'active', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('taxonomy_terms');
    }
};
