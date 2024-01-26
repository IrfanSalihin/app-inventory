<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upowersupp extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'model',
        'modeltype',
        'serialnumber',
        'supplier',
        'ponumber',
        'invoicenumber',
        'price',
        'purchasedate',
        'purchasedateaccount',
        'warranty',
        'status',
    ];
}
