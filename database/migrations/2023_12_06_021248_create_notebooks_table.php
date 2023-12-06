<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotebooksTable extends Migration
{
    public function up()
    {
        Schema::create('notebooks', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name');
            $table->string('location');
            $table->string('staff_number');
            $table->string('notebook_details_model');
            $table->string('notebook_details_pc_name');
            $table->string('notebook_details_serial_number');
            $table->string('charger_model');
            $table->string('charger_serial_number');
            $table->integer('power_cable_quantity');
            $table->string('operating_system');
            $table->string('windows_product_key')->nullable();
            $table->string('operating_system_bit');
            $table->string('processor');
            $table->string('device_id');
            $table->string('product_id');
            $table->string('storage_drives');
            $table->string('storage_size');
            $table->string('ram_size');
            $table->string('graphic_card');
            $table->string('microsoft_office_version');
            $table->string('microsoft_office_license_key');
            $table->string('microsoft_office_outlook_id');
            $table->string('microsoft_office_outlook_password');
            $table->boolean('antivirus_present');
            $table->date('antivirus_expired_date')->nullable();
            $table->string('antivirus_license_key')->nullable();
            $table->date('antivirus_purchasing_date')->nullable();
            $table->double('antivirus_renewal_price')->nullable();
            $table->string('notebook_warranty');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notebooks');
    }
}

