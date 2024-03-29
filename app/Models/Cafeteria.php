<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafeteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'staffname',
        'staffnumber',
        'item',
        'itemdescription',
        'brandnmodel',
        'serialnumber',
        'payment',
        'originalvalue',
        'status',
    ];
}
