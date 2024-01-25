<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcodescanner extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'location',
        'branches',
        'department',
        'staffname',
        'model',
        'serialnumber',
        'purchasedate',
        'price',
        'notes',
        'status',
    ];
}
