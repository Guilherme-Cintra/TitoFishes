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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fish_id');
            $table->unsignedBigInteger('cart_id');
            $table->integer('quantity');
            $table->decimal('price', 8, 2); 
            $table->timestamps();

            $table->foreign('fish_id')->references('id')->on('table_fishes')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
