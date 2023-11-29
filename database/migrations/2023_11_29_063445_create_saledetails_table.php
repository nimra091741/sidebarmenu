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
        Schema::create('saledetails', function (Blueprint $table) {
            $table->id();
            $table->string('sales_id');
            $table->string('product_id');
            $table->string('product_price_with_profit');
            $table->string('product_quantity');
            $table->string('gross_price');
            //gross price=product_quantity*product_price_with_profit;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saledetails');
    }
};
