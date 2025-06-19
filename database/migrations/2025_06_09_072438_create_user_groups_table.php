<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser GroupsTable extends Migration
{
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('entity_status_id'); // Ensure this matches the type in entity_statuses
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('entity_status_id')->references('id')->on('entity_statuses')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_groups');
    }
};
