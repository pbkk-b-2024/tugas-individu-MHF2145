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
        // Users table (if it does not already exist)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Password reset tokens table
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Sessions table for user session management
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();  // Primary key
            $table->foreignId('user_id')->nullable()->index();  // Foreign key for the user
            $table->string('ip_address', 45)->nullable();  // IP address of the session
            $table->text('user_agent')->nullable();  // User agent string
            $table->longText('payload');  // Session data
            $table->integer('last_activity')->index();  // Timestamp of the last session activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
