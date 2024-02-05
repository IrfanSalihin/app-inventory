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
        Schema::create('photostatemacs', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('level');
            $table->string('model');
            $table->string('type');
            $table->string('serialnumber');
            $table->enum('ownership', ['Rental', 'KOBIMBING' ])->default('Rental');
            $table->enum('status', ['Active', 'Return', 'Scrap' ])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photostatemacs');
    }
};
