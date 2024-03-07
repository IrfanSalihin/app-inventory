<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desktops extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_name',
        'location',
        'staff_number',
        'cpu_model',
        'cpu_name',
        'cpu_serial_number',
        'monitor_model',
        'monitor_serial_number',
        'keyboard',
        'mouse',
        'pc_cable',
        'vga_cable',
        'operating_system_name',
        'windows_product_key',
        'operating_system_bit',
        'processor',
        'device_id',
        'product_id',
        'hdd_sizes',
        'ssd_sizes',
        'ram_sizes',
        'microsoft_office_year',
        'microsoft_office_lisence',
        'microsoft_office_id',
        'microsoft_office_password',
        'antivirus',
        'antivirus_expired_date',
        'antivirus_lisence',
        'year',
        'account_purchase_date',
        'date_purchased',
        'price',
        'status',
    ];
}
