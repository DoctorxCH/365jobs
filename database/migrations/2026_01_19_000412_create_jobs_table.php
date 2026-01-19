<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();

            // Beziehungen
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();

            // Identifikation & Beziehungen (Taxonomy Terms)
            $table->unsignedBigInteger('category_term_id')->nullable();
            $table->unsignedBigInteger('profession_term_id')->nullable();
            $table->unsignedBigInteger('experience_term_id')->nullable();
            $table->unsignedBigInteger('education_term_id')->nullable();
            $table->unsignedBigInteger('job_type_term_id')->nullable();
            $table->unsignedBigInteger('salary_type_term_id')->nullable();

            // Inhalt & Darstellung
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('reference_number')->nullable();
            $table->string('seniority')->nullable();
            $table->string('short_description', 500)->nullable();
            $table->longText('description');

            // Recruiting & Anforderungen
            $table->json('driving_licenses')->nullable(); // e.g. ["B","C"] or term keys
            $table->boolean('requires_own_vehicle')->default(false);
            $table->string('company_car_policy')->nullable();
            $table->boolean('is_graduate_friendly')->default(false);
            $table->boolean('is_disability_friendly')->default(false);
            $table->boolean('requires_travel')->default(false);

            // Arbeitsmodell
            $table->boolean('is_remote')->default(false);
            $table->string('workplace_type')->nullable();
            $table->unsignedTinyInteger('home_office_percent')->nullable();

            // Vergütung & Zeitraum
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->date('job_start')->nullable();

            // Bewerbung
            $table->string('apply_on')->nullable(); // internal | email | url (optional taxonomy later)
            $table->string('apply_email')->nullable();
            $table->string('apply_url')->nullable();

            // Standort + Geo (Radius-Suche)
            $table->string('address')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();

            // Sichtbarkeit & Marketing
            $table->boolean('featured')->default(false);
            $table->dateTime('featured_until')->nullable();
            $table->boolean('highlight')->default(false);
            $table->dateTime('highlight_until')->nullable();

            // Status & Workflow
            $table->string('status')->default('waiting_approval_create');

            // Tracking & Meta
            $table->unsignedBigInteger('total_views')->default(0);

            $table->timestamps();

            // Indizes
            $table->index(['company_id', 'status']);
            $table->index(['status', 'featured', 'highlight']);
            $table->index(['lat', 'lng']);

            $table->index(['category_term_id']);
            $table->index(['profession_term_id']);
            $table->index(['experience_term_id']);
            $table->index(['education_term_id']);
            $table->index(['job_type_term_id']);
            $table->index(['salary_type_term_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
