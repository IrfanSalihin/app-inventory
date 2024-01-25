<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walkietalkie extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'item',
        'model',
        'serialnumber',
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
