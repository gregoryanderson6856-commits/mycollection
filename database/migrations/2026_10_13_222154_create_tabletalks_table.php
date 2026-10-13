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
        Schema::create('tabletalks', function (Blueprint $table) {
            $table->id();
            $table->string('title', length: 100);
            $table->decimal('coverprice', 4,2);
            $table->string('month', length: 15);
            $table->string('year', length: 10);
            $table->string('imagePath', length: 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabletalks');
    }
};
