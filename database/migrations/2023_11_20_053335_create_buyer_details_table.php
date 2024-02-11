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
        Schema::create('buyer_details', function (Blueprint $table) {
            $table->id();
            $table->string('catalogue_name');
            $table->string('buyername');
            $table->string('buyer_email');
            $table->integer('pin_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyer_detail');
    }
};
