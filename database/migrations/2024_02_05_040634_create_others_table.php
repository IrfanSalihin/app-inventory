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
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('place');
            $table->string('model');
            $table->string('item');
            $table->string('unit');
            $table->string('serialnumber');
            $table->string('supplier');
            $table->date('purchasedate');
            $table->decimal('price', 8, 2);
            $table->enum('status', ['Available', 'Damage', 'Reserved', 'Scrap'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('others');
    }
};
