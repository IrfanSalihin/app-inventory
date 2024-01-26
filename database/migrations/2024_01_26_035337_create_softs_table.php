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
        Schema::create('softs', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('vendor');
            $table->string('location');
            $table->date('payment');
            $table->decimal('originalvalue', 8, 2);
            $table->enum('status', ['Active', 'Unactive', 'Subscribe', 'Unsubscribe'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('softs');
    }
};
