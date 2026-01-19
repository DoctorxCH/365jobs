<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_field_definitions', function (Blueprint $table) {
            $table->id();

            // target: "job" or "company"
            $table->string('target', 20);

            // stable key used in code
            $table->string('key', 100);

            $table->string('label_en');
            $table->string('label_sk')->nullable();

            // text, textarea, number, boolean, date, select, multiselect, url, email
            $table->string('type', 30);

            // for select/multiselect: JSON array of options (or objects)
            $table->json('options')->nullable();

            $table->boolean('enabled')->default(true);
            $table->boolean('required')->default(false);

            $table->unsignedSmallInteger('sort')->default(0);

            $table->timestamps();

            $table->unique(['target', 'key']);
            $table->index(['target', 'enabled', 'sort']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_field_definitions');
    }
};
