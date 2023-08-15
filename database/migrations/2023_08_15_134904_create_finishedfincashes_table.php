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
        Schema::create('finishedfincashes', function (Blueprint $table) {
            $table->increments('finishfincash_id');
            $table->unsignedInteger('openfincash_id');
            $table->decimal('new_value',10,2);
            $table->timestamps();

            $table->foreign('openfincash_id')->references('openfincash_id')->on('openedfincashes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finishedfincashes');
    }
};
