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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('color_id')->nulable();
            $table->integer('size_id')->nulable();
            $table->decimal('purchase_price', 10, 2)->nulable();
            $table->decimal('selling_price', 10, 2)->nullable();
            $table->string('sku')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
