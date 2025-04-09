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
        Schema::create('base_handles', function (Blueprint $table) {
            $table->id();

            $table->integer('option_1')->nullable();
            $table->integer('option_2')->nullable();
            $table->integer('option_3')->nullable();
            $table->integer('option_4')->nullable();
            $table->integer('option_5')->nullable();
            $table->integer('option_6')->nullable();
            $table->integer('option_7')->nullable();
            $table->integer('option_8')->nullable();
            $table->integer('option_9')->nullable();

            $table->integer('base_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_handles');
    }
};
