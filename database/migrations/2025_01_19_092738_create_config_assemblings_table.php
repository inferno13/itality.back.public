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
        Schema::create('config_assemblings', function (Blueprint $table) {
            $table->id();
            $table->integer('config_id')->nullable();
            $table->integer('base_id')->nullable();
            $table->string('image')->nullable();
            $table->boolean('ishower_on')->nullable();
            $table->boolean('ishower_default')->nullable();
            $table->boolean('dushmaster_on')->nullable();
            $table->boolean('dushmaster_default')->nullable();
            $table->boolean('itality_on')->nullable();
            $table->boolean('itality_default')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_assemblings');
    }
};
