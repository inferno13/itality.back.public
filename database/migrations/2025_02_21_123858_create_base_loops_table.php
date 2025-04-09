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
        Schema::create('base_loops', function (Blueprint $table) {
            $table->id();

            $table->string('mark')->nullable();
            $table->string('comment')->nullable();
            $table->string('gaps')->nullable();
            $table->boolean('chamfer')->nullable();
            $table->string('scheme')->nullable();
            $table->boolean('pdf')->nullable();

            $table->integer('base_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_loops');
    }
};
