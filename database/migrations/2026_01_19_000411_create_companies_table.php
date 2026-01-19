<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            // Public / profile
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->string('logo_path')->nullable();

            // Slovakia identification
            $table->string('ico', 16)->nullable()->index();     // IČO
            $table->string('dic', 16)->nullable()->index();     // DIČ
            $table->string('ic_dph', 20)->nullable()->index();  // IČ DPH

            // Contact person
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_address')->nullable();

            // Company contact
            $table->string('company_address')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedInteger('employees_count')->nullable();

            // Location helpers
            $table->string('country', 2)->nullable(); // SK
            $table->string('city')->nullable();

            // System flags
            $table->timestamp('verified_at')->nullable();
            $table->boolean('active')->default(true);

            // Team limits (owner + 9 members)
            $table->unsignedTinyInteger('team_seat_limit')->default(10);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
