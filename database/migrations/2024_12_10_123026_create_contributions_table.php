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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('age');
            $table->unsignedBigInteger('member_type');
            $table->smallInteger('amount');
            $table->unsignedBigInteger('fiscal_year_id');
            $table->timestamps();

            $table->foreign('member_type')->references('id')->on('member_types');
            $table->foreign('fiscal_year_id')->references('id')->on('fiscal_years');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contributions');
    }
};
