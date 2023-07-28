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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 32)->unique();
            $table->string('full_name', 64)->nullable();
            $table->integer('type')->default(0);
            $table->string('email', 64);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',64);
            $table->string('description',250)->nullable();
            $table->string('phone_number', 12)->nullable();
            $table->string('profile_picture', 250)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
