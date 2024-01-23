<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'model',
        'type',
        'serialnumber',
        'ram',
        'rom',
        'color',
        'supplier',
        'purchasedate',
        'price',
        'warranty',
        'status'
    ];
}

