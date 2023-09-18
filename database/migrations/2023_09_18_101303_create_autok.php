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
        Schema::create('autok', function (Blueprint $table) {
            $table->id('a_id');
            $table->string('rendszam',10);
            $table->string('motor_tipus',1);
            $table->foreignId('szin_id')->references('szin_id')->on('szinek');
            $table->string('meghajtas',1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autok');
    }
};
