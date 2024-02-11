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
        Schema::create('company_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_address');
            $table->string('company_phone');
            $table->string('bank_account',20);
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('country_name');
            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_accounts');
    }
};
