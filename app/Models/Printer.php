<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'level',
        'staff_name',
        'brand',
        'model',
        'serial_number',
        'supplier',
        'po_number',
        'invoice_number',
        'price',
        'purchasing_date',
        'purchasing_date_for_account',
        'warranty',
        'remarks',
    ];
}
