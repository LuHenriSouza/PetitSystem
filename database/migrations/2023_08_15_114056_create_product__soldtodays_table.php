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
        Schema::create('product__soldtodays', function (Blueprint $table) {
            $table->increments('prod_sold_id');
            $table->unsignedInteger('prod_id');
            $table->unsignedInteger('sale_id');
            $table->integer('qnt');
            $table->decimal('unique_price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();

            $table->foreign('sale_id')->references('sale_id')->on('soldtodays');
            $table->foreign('prod_id')->references('prod_id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product__soldtodays');
    }
};
