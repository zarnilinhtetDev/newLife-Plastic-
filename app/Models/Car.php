<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function buys()
    {
        return $this->hasMany(Buy::class, 'car_id');
    }
}
