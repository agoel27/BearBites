<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->integer('storeID')->primary();
            $table->string('address', 50);
            $table->string('city', 50);
            $table->string('state', 60);
            $table->string('isOpen', 60);
            $table->float('reviewScore')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};