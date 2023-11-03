<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'email', 'address', 'location', 'payment'];
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
