<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_name',
        'location',
        'staff_number',
        'notebook_details_model',
        'notebook_details_pc_name',
        'notebook_details_serial_number',
        'charger_model',
        'charger_serial_number',
        'power_cable_quantity',
        'operating_system',
        'windows_product_key',
        'operating_system_bit',
        'processor',
        'device_id',
        'product_id',
        'storage_drives',
        'storage_size',
        'ram_size',
        'graphic_card',
        'microsoft_office_version',
        'microsoft_office_license_key',
        'microsoft_office_outlook_id',
        'microsoft_office_outlook_password',
        'antivirus_present',
        'antivirus_expired_date',
        'antivirus_license_key',
        'antivirus_purchasing_date',
        'antivirus_renewal_price',
        'notebook_warranty',
    ];
}
