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
        Schema::create('team_pokemon', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained('teams')->onDelete('cascade');
            $table->foreignId('pokemon_id')->constrained('pokemon')->onDelete('cascade');
            $table->string('nickname')->nullable(); // Optional nickname for Pokémon
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_pokemon');
    }
};
