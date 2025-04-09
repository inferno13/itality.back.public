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
        Schema::create('config_scenes', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->integer('config_id')->nullable();
            $table->string('button')->nullable();
            $table->string('scene_left')->nullable();
            $table->string('scene_right')->nullable();
            $table->string('mask_left')->nullable();
            $table->string('mask_right')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_scenes');
    }
};
