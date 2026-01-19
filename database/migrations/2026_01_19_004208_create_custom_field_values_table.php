<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_field_values', function (Blueprint $table) {
            $table->id();

            $table->foreignId('custom_field_definition_id')
                ->constrained('custom_field_definitions')
                ->cascadeOnDelete();

            // 'job' oder 'company' (string statt morphs, damit index kurz bleibt)
            $table->string('entity_type', 32);
            $table->unsignedBigInteger('entity_id');

            // JSON value (MySQL JSON)
            $table->json('value')->nullable();

            $table->timestamps();

            // für Abfragen
            $table->index(['entity_type', 'entity_id'], 'cfv_entity_idx');

            // Kritisch: kurzer Indexname (MySQL 64-char limit)
            $table->unique(
                ['custom_field_definition_id', 'entity_type', 'entity_id'],
                'cfv_def_entity_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_field_values');
    }
};
