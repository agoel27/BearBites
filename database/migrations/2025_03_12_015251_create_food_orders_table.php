<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('food_orders', function (Blueprint $table) {
            $table->integer('orderID')->primary();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Reference `user_id`
            $table->integer('storeID');
            $table->decimal('totalPrice', 10, 2);
            $table->timestamp('orderTimestamp');
            $table->char('orderStatus', 50)->nullable();
            $table->foreign('storeID')->references('storeID')->on('stores')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('food_orders');
    }
};