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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->boolean('active')->nullable();
            $table->integer('pos')->nullable();
            $table->integer('grouping_id')->nullable();
            $table->string('title');
            $table->integer('assembling_id')->nullable();
            $table->integer('col')->nullable();
            $table->string('view')->nullable();
            $table->string('type')->nullable();
            $table->integer('project_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
