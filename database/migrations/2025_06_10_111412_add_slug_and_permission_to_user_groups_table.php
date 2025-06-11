<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
 {
    public function up(): void
    {
        Schema::table('user_groups', function (Blueprint $table) {
           $table->string('slug')->nullable()->after('name'); // no unique
            $table->json('permission')->nullable()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('user_groups', function (Blueprint $table) {
            $table->dropColumn(['slug', 'permission']);
        });
    }
};

