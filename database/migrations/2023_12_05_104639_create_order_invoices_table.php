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
        Schema::create('order_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('buyer_id');
            $table->integer('company_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('total_amount');
            $table->string('grandtotal');
            $table->string('discount');
            $table->integer('status')->default(0);
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_invoices');
    }
};
