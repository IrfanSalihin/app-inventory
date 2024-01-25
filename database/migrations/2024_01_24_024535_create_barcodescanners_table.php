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
        Schema::create('barcodescanners', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('branches');
            $table->string('department');
            $table->string('staffname');
            $table->string('model');
            $table->string('serialnumber');
            $table->date('purchasedate');
            $table->decimal('price', 8, 2);
            $table->text('notes')->nullable();
            $table->enum('status', ['Available', 'Damage', 'Reserved', 'Scrap'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barcodescanners');
    }
};
