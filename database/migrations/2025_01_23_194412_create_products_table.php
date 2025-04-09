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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('pos')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('title');
            $table->string('color')->nullable();
            $table->integer('cash')->nullable();
            $table->integer('remains')->nullable();
            $table->integer('shipment')->nullable();
            $table->string('qr')->nullable();
            $table->boolean('fix')->nullable();
            $table->integer('collection_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('norma')->nullable();
            $table->string('video')->nullable();
            $table->string('unit')->nullable();
            $table->longText('text')->nullable();
            $table->integer('period')->nullable();
            $table->boolean('active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
