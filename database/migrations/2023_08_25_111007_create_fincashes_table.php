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
        Schema::create('fincashes', function (Blueprint $table) {
            $table->increments('fincash_id');
            $table->string('fincash_name');
            $table->decimal('fincash_value',10,2);
            $table->boolean('fincash_isFinished')->default(false);
            $table->decimal('fincash_finalValue',10,2)->nullable();
            $table->dateTime('fincash_finalDate')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fincashes');
    }
};
