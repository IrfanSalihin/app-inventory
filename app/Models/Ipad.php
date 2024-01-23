<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipad extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'name',
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
