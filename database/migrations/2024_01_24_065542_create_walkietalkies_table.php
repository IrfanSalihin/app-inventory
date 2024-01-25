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
        Schema::create('walkietalkies', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('item');
            $table->string('model');
            $table->string('serialnumber');
            $table->string('ponumber');
            $table->string('invoicenumber');
            $table->decimal('price', 8, 2);
            $table->date('purchasedate');
            $table->date('purchasedateaccount');
            $table->date('warranty');
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
        Schema::dropIfExists('walkietalkies');
    }
};
