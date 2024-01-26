<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Soft extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'vendor',
        'location',
        'payment',
        'originalvalue',
        'status',
    ];
}
