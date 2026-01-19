<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('field_visibility', function (Blueprint $table) {
            $table->id();

            // target: "job" or "company"
            $table->string('target', 20);

            // field_key examples: "min_salary", "apply_url", "driving_licenses"
            $table->string('field_key', 100);

            $table->boolean('enabled')->default(true);
            $table->boolean('required')->default(false);
            $table->unsignedSmallInteger('sort')->nullable();

            $table->timestamps();

            $table->unique(['target', 'field_key']);
            $table->index(['target', 'enabled']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('field_visibility');
    }
};
