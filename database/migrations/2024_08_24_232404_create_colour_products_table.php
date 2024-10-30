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
        Schema::create('colour_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('colour_id')->nullable()->index()->constrained('colours');
            $table->foreignId('product_id')->nullable()->index()->constrained('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colour_products');
    }
};
