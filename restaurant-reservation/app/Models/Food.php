<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'price',
        'image',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
