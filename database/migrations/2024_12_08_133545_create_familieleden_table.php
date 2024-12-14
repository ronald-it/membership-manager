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
        Schema::create('familieleden', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('familie_id');
            $table->string('naam');
            $table->date('geboortedatum');
            $table->unsignedBigInteger('lidsoort_id');
            $table->timestamps();

            $table->foreign('familie_id')->references('id')->on('families')->onDelete('cascade');
            $table->foreign('lidsoort_id')->references('id')->on('lidsoorten');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('familieleden');
    }
};
