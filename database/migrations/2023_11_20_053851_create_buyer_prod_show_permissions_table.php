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
        Schema::create('buyer_prod_show_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('buyer_id');
            $table->string('product_id');
            $table->string('securitycode');
            $table->string('selling_price')->nullable();
            $table->string('prod_name')->nullable();
            $table->text('descripation')->nullable();
            $table->string('color')->nullable();
            $table->string('production_technique')->nullable();
            $table->string('material')->nullable();
            $table->string('size')->nullable();
            $table->string('shape')->nullable();
            $table->string('sampling_time')->nullable();
            $table->string('production_time')->nullable();
            $table->string('moq')->nullable();
            $table->string('remarks')->nullable();
            $table->text('image_shape')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_prod_show_permissions');
    }
};
