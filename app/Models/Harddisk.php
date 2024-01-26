<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Harddisk extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'branches',
        'department',
        'staffname',
        'model',
        'serialnumber',
        'storagesize',
        'supplier',
        'ponumber',
        'invoicenumber',
        'price',
        'purchasedate',
        'purchasedateaccount',
        'warranty',
        'notes',
        'status',
    ];
}
