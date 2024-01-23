<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voicerecorder extends Model
{
    use HasFactory;
    protected $fillable = [
        'location',
        'place',
        'level',
        'model',
        'serialnumber',
        'memorycard',
        'description',
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
