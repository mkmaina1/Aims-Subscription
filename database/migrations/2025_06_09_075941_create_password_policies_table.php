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
       
Schema::create('password_policies', function (Blueprint $table) {
    $table->id();
    $table->integer('min_length')->default(8);
    $table->boolean('alphanumeric')->default(true);
    $table->boolean('require_uppercase')->default(true);
    $table->boolean('require_number')->default(true);
    $table->boolean('require_special')->default(true);
    $table->integer('expiry_days')->default(0);
    $table->integer('start_warning_days')->default(1);
    $table->integer('max_login_attempts')->default(5);
    $table->integer('lockout_duration')->default(1); // in minutes
    $table->boolean('use_otp')->default(false);
    $table->integer('otp_expiry_duration')->nullable();
    $table->integer('inactive_days')->default(30);
    $table->integer('session_lifetime')->default(500);
    $table->integer('password_reuse_limit')->default(3);
    $table->integer('password_reuse_time_limit')->default(5);
    $table->string('password_reuse_time_period')->default('months');
    $table->integer('max_partial_lockouts')->default(2);
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_policies');
    }
};
