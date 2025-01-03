<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capactiy', 'status'];

    //A table can have many reservations
    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
