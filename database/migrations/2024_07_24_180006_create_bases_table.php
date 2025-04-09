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
        Schema::create('bases', function (Blueprint $table) {

            $table->id();

            $table->boolean('active')->nullable();
            $table->integer('pos')->nullable();
            $table->integer('button_category_id')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('grouping_id')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('property')->nullable();
            $table->string('structure')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bases');
    }
};
