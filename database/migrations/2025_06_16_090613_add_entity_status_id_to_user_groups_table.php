<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
      public function up()
   {
       Schema::table('user_groups', function (Blueprint $table) {
           $table->foreignId('entity_status_id')->constrained('entity_statuses')->default(1); // Assuming 1 is the default status
       });
   }

   public function down()
   {
       Schema::table('user_groups', function (Blueprint $table) {
           $table->dropForeign(['entity_status_id']);
           $table->dropColumn('entity_status_id');
       });
   }

};
