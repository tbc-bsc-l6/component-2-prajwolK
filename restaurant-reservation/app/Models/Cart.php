<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'name',
        'details',
        'price',
        'image',
        'quantity',
    ];
}
