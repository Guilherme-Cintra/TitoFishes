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
        Schema::create('table_fish_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fish_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->foreign('fish_id')->references('id')->on('table_fishes')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('table_category')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_fish_category');
    }
};
