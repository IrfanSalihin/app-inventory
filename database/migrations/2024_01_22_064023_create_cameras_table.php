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
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->integer('level');
            $table->string('staffname');
            $table->string('model');
            $table->string('modeltype');
            $table->string('serialnumber');
            $table->string('supplier');
            $table->string('ponumber');
            $table->string('invoicenumber');
            $table->decimal('price', 8, 2);
            $table->date('purchasedate');
            $table->date('purchasedateaccount');
            $table->date('warranty');
            $table->enum('status', ['Available', 'Damage', 'Reserved', 'Scrap'])->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cameras');
    }
};
