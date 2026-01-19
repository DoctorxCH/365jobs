<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('package_id')->constrained()->cascadeOnDelete();

            $table->integer('job_credits_total');
            $table->integer('job_credits_remaining');

            $table->string('provider')->nullable();     // stripe, manual, etc.
            $table->string('provider_ref')->nullable(); // payment intent / invoice id
            $table->timestamp('purchased_at')->nullable();

            $table->timestamps();

            $table->index(['company_id', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
