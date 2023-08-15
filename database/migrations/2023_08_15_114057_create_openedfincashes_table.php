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
        Schema::create('openedfincashes', function (Blueprint $table) {
            $table->increments('openfincash_id');
            $table->string('openfincash_name');
            $table->decimal('openfincash_value',10,2);
            $table->boolean('openfincash_isFinished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('openedfincashes');
    }
};
