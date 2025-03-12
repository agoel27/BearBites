<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('items_in_order', function (Blueprint $table) {
            $table->integer('orderID');
            $table->string('itemName', 50);
            $table->integer('quantity');
            $table->primary(['orderID', 'itemName']);
            $table->foreign('orderID')->references('orderID')->on('food_orders')->onDelete('cascade');
            $table->foreign('itemName')->references('itemName')->on('items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('items_in_order');
    }
};