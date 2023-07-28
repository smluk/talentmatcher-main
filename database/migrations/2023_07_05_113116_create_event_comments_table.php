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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('user_id');
            $table->text('body', 250);
            $table->integer('likes')->default(0);
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->ondelete('cascade')->onupdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade')->onupdate('cascade');

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_comments');
    }

};
