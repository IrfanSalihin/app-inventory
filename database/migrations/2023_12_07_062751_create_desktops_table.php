<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesktopsTable extends Migration
{

    public function up()
    {
        Schema::create('desktops', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name');
            $table->string('location');
            $table->string('staff_number');
            $table->string('cpu_model');
            $table->string('cpu_name');
            $table->string('cpu_serial_number');
            $table->string('monitor_model');
            $table->string('monitor_serial_number');
            $table->string('keyboard');
            $table->string('mouse');
            $table->integer('pc_cable'); 
            $table->integer('vga_cable'); 
            $table->string('operating_system_name');
            $table->string('windows_product_key');
            $table->integer('operating_system_bit'); 
            $table->string('processor');
            $table->string('device_id');
            $table->string('product_id');
            $table->integer('hdd_sizes'); 
            $table->integer('ssd_sizes'); 
            $table->integer('ram_sizes'); 
            $table->string('microsoft_office_year');
            $table->string('microsoft_office_lisence');
            $table->string('microsoft_office_id');
            $table->string('microsoft_office_password');
            $table->boolean('antivirus');
            $table->date('antivirus_expired_date')->nullable();
            $table->string('antivirus_lisence')->nullable();
            $table->string('year');
            $table->date('account_purchase_date');
            $table->decimal('price', 8, 2);
            $table->enum('status', ['Available', 'Damage', 'Reserved', 'Scrap'])->default('Available');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('desktops');
    }
}

