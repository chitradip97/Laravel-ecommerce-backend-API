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
        Schema::create('shipping_products', function (Blueprint $table) {
            $table->id();
            $table->string('Shipping_id');
            $table->string('Product_id');
            $table->string('Product_category');
            $table->string('Product_brand');
            $table->string('Product_name');
            $table->integer('Product_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_products');
    }
};
