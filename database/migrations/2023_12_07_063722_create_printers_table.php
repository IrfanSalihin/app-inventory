<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintersTable extends Migration
{
    public function up()
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('level');
            $table->string('staff_name');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number');
            $table->string('supplier');
            $table->string('po_number');
            $table->string('invoice_number');
            $table->double('price');
            $table->date('purchasing_date');
            $table->date('purchasing_date_for_account');
            $table->string('warranty');
            $table->text('remarks')->nullable();
            $table->enum('status', ['Available', 'Damage', 'Reserved', 'Scrap'])->default('Available');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('printers');
    }
}
