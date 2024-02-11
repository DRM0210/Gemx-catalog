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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('group_id');
            $table->string('sku')->nullable();
            $table->string('product_type');
            $table->string('quantity')->nullable();
            $table->decimal('purchase_price', 10, 2)->nullable();
            $table->decimal('selling_price', 10, 2)->nullable();
            $table->decimal('tax', 5, 2)->nullable();
            $table->string('product_themlin');
            $table->string('status')->default('0');
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('units');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('group_id')->references('id')->on('groups');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
