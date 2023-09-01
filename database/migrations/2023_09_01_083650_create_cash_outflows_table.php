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
        Schema::create('cash_outflows', function (Blueprint $table) {
            $table->increments('outflow_id');
            $table->unsignedInteger('outflow_type_id');
            $table->unsignedInteger('fincash_id');
            $table->decimal('outflow_value',10,2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('outflow_type_id')->references('outflow_type_id')->on('outflow_types');
            $table->foreign('fincash_id')->references('fincash_id')->on('fincashes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_outflows');
    }
};
