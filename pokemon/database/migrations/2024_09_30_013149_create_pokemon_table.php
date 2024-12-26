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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->float('height');
            $table->float('weight');
            $table->text('abilities');
            $table->text('top_moves'); // Stores top 10 moves
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
};
