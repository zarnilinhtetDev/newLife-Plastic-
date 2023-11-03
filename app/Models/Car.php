<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
    public function branch()
    {
        return $this->hasOne(Branch::class);
    }
    public function carExpenses()
    {
        return $this->hasMany(CarExpenses::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
