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
        Schema::create('contributies', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('leeftijd');
            $table->unsignedBigInteger('soort_lid');
            $table->smallInteger('bedrag');
            $table->unsignedBigInteger('boekjaar_id');
            $table->timestamps();

            $table->foreign('soort_lid')->references('id')->on('lidsoorten');
            $table->foreign('boekjaar_id')->references('id')->on('boekjaren');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributies');
    }
};
