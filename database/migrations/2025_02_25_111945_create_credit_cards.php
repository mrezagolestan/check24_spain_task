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
        Schema::create('credit_cards', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->index();
            $table->integer('bank_id');
            $table->json('product');
            $table->string('bank',150);
            $table->string('link');
            $table->string('logo');
            $table->json('extra_informations');
            $table->json('price');
            $table->string('incentive', 50);
            $table->string('incentive_amount', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_cards');
    }
};
