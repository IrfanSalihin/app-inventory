<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'place',
        'model',
        'item',
        'unit',
        'serialnumber',
        'supplier',
        'purchasedate',
        'price',
        'status',
    ];
}
