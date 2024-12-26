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
        Schema::create('team_moves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_pokemon_id')->constrained('team_pokemon')->onDelete('cascade');
            $table->string('move_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_moves');
    }
};
