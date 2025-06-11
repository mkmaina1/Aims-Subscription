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
    $table->boolean('require_uppercase')->default(true);
    $table->boolean('require_number')->default(true);
    $table->boolean('require_special')->default(false);
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
