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
    public function addpayments()
    {
        return $this->hasMany(AddPayment::class, 'car_id');
    }
    public function offers()
    {
        return $this->hasMany(Offer::class, 'car_id');
    }
    public function carExpenses()
    {
        return $this->hasMany(CarExpense::class);
    }
    public function buyer()
    {
        return $this->hasOne(Buyer::class, 'car_id', 'id');
    }
}
