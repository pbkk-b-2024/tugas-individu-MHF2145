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
        Schema::create('user_feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to users table
            $table->text('feedback_content');
            $table->timestamp('created_at')->useCurrent(); // Use Laravel's useCurrent() for timestamp
            $table->boolean('status')->default(false); // False = Unread, True = Addressed
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_feedback');
    }
};
