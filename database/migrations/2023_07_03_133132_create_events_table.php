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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name', 64);
            $table->integer('event_type');
            $table->integer('event_category');
            $table->string('event_image', 64)->default('default.jpg');
            $table->integer('event_budget');
            $table->string('event_description', 250);
            $table->string('event_location_text', 64);
            $table->string('event_location_long', 64)->nullable();
            $table->string('event_location_lat', 64)->nullable();
            $table->datetime('event_start_datetime');
            $table->datetime('event_end_datetime');
            $table->integer('event_max_participants');
            $table->integer('event_enrolled_participants')->default(0);
            $table->integer('event_likes')->default(0);
            $table->integer('event_status')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade')->onupdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

