<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('plan_name'); // Basic, Standard, Premium
    $table->date('start_date');
    $table->date('end_date')->nullable();
    $table->date('renewal_date')->nullable();
    $table->boolean('auto_renew')->default(true);
    $table->string('invoice_path')->nullable(); // store PDF path
    $table->enum('status', ['active', 'expired', 'cancelled'])->default('active');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
