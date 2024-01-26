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
        Schema::create('cafeterias', function (Blueprint $table) {
            $table->id();
            $table->string('staffname');
            $table->string('staffnumber');
            $table->string('item');
            $table->string('itemdescription');
            $table->string('brandnmodel');
            $table->string('serialnumber');
            $table->date('payment');
            $table->decimal('originalvalue', 8, 2);
            $table->enum('status', ['Available', 'Damage', 'Reserved', 'Scrap'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cafeterias');
    }
};
