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
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->string('Customer_id');
            $table->string('Shipping_Fname');
            $table->string('Shipping_Lname');
            $table->string('Phone');
            $table->string('Email');
            $table->string('Address');
            $table->string('City');
            $table->string('Dist');
            $table->string('House');
            $table->string('Pin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_details');
    }
};
