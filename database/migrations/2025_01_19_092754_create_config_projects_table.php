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
        Schema::create('config_projects', function (Blueprint $table) {
            $table->id();

            $table->string('scheme')->nullable();
            $table->string('walkin')->nullable();
            $table->string('inside')->nullable();
            $table->string('outside')->nullable();
            $table->string('outin')->nullable();
            $table->string('sliding')->nullable();

            $table->integer('coord_x')->nullable();
            $table->integer('coord_y')->nullable();
            $table->integer('turn')->nullable();
            $table->integer('value_1')->nullable();
            $table->integer('value_2')->nullable();
            $table->integer('value_3')->nullable();
            $table->string('select_1')->nullable();
            $table->string('select_2')->nullable();
            $table->string('select_3')->nullable();
            $table->string('select_4')->nullable();
            $table->string('select_5')->nullable();
            $table->string('select_6')->nullable();
            $table->string('select_7')->nullable();
            $table->string('select_8')->nullable();
            $table->string('select_9')->nullable();
            $table->string('select_10')->nullable();
            $table->string('select_11')->nullable();
            $table->string('select_12')->nullable();
            $table->string('select_13')->nullable();
            $table->string('select_14')->nullable();
            
            $table->integer('coord_x_2')->nullable();
            $table->integer('coord_y_2')->nullable();
            $table->integer('turn_2')->nullable();
            $table->integer('value_1_2')->nullable();
            $table->integer('value_2_2')->nullable();
            $table->integer('value_3_2')->nullable();
            $table->string('select_1_2')->nullable();
            $table->string('select_2_2')->nullable();
            $table->string('select_3_2')->nullable();
            $table->string('select_4_2')->nullable();
            $table->string('select_5_2')->nullable();
            $table->string('select_6_2')->nullable();
            $table->string('select_7_2')->nullable();
            $table->string('select_8_2')->nullable();
            $table->string('select_9_2')->nullable();
            $table->string('select_10_2')->nullable();
            $table->string('select_11_2')->nullable();
            $table->string('select_12_2')->nullable();
            $table->string('select_13_2')->nullable();
            $table->string('select_14_2')->nullable();

            $table->integer('coord_x_3')->nullable();
            $table->integer('coord_y_3')->nullable();
            $table->integer('turn_3')->nullable();
            $table->integer('value_1_3')->nullable();
            $table->integer('value_2_3')->nullable();
            $table->integer('value_3_3')->nullable();
            $table->string('select_1_3')->nullable();
            $table->string('select_2_3')->nullable();
            $table->string('select_3_3')->nullable();
            $table->string('select_4_3')->nullable();
            $table->string('select_5_3')->nullable();
            $table->string('select_6_3')->nullable();
            $table->string('select_7_3')->nullable();
            $table->string('select_8_3')->nullable();
            $table->string('select_9_3')->nullable();
            $table->string('select_10_3')->nullable();
            $table->string('select_11_3')->nullable();
            $table->string('select_12_3')->nullable();
            $table->string('select_13_3')->nullable();
            $table->string('select_14_3')->nullable();

            $table->integer('coord_x_4')->nullable();
            $table->integer('coord_y_4')->nullable();
            $table->integer('turn_4')->nullable();
            $table->integer('value_1_4')->nullable();
            $table->integer('value_2_4')->nullable();
            $table->integer('value_3_4')->nullable();
            $table->string('select_1_4')->nullable();
            $table->string('select_2_4')->nullable();
            $table->string('select_3_4')->nullable();
            $table->string('select_4_4')->nullable();
            $table->string('select_5_4')->nullable();
            $table->string('select_6_4')->nullable();
            $table->string('select_7_4')->nullable();
            $table->string('select_8_4')->nullable();
            $table->string('select_9_4')->nullable();
            $table->string('select_10_4')->nullable();
            $table->string('select_11_4')->nullable();
            $table->string('select_12_4')->nullable();
            $table->string('select_13_4')->nullable();
            $table->string('select_14_4')->nullable();

            $table->integer('coord_x_5')->nullable();
            $table->integer('coord_y_5')->nullable();
            $table->integer('turn_5')->nullable();
            $table->integer('value_1_5')->nullable();
            $table->integer('value_2_5')->nullable();
            $table->integer('value_3_5')->nullable();
            $table->string('select_1_5')->nullable();
            $table->string('select_2_5')->nullable();
            $table->string('select_3_5')->nullable();
            $table->string('select_4_5')->nullable();
            $table->string('select_5_5')->nullable();
            $table->string('select_6_5')->nullable();
            $table->string('select_7_5')->nullable();
            $table->string('select_8_5')->nullable();
            $table->string('select_9_5')->nullable();
            $table->string('select_10_5')->nullable();
            $table->string('select_11_5')->nullable();
            $table->string('select_12_5')->nullable();
            $table->string('select_13_5')->nullable();
            $table->string('select_14_5')->nullable();

            $table->integer('config_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('config_projects');
    }
};
