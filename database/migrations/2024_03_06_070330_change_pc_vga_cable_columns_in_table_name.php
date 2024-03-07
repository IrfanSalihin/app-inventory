<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('desktops', function (Blueprint $table) {
            // Change column type to boolean and set default value to false
            $table->boolean('pc_cable')->default(false)->change();
            $table->boolean('vga_cable')->default(false)->change();
            $table->boolean('keyboard')->default(false)->change();
            $table->boolean('mouse')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_name', function (Blueprint $table) {
            //
        });
    }
};
