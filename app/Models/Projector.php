<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projector extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'place',
        'level',
        'model',
        'modelnumber',
        'serialnumber',
        'pwd',
        'snid',
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
