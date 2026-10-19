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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // This creates itemable_id (BigInt) and itemable_type (String) fields
            $table->morphs('itemable'); 
            
            $table->integer('quantity')->default(1);
            $table->decimal('price_at_addition', 10, 2);
            $table->timestamps();

            // Prevents unique duplicate line entries; aggregates instead
            $table->unique(['user_id', 'itemable_id', 'itemable_type'], 'user_cart_unique_item');
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
