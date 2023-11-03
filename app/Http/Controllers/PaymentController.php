<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\Car; // Import the Car model
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentController extends Controller
{
    public function payment()
    {

        $cars = Car::with('driver')->get();
        $branches = Branch::all();
        return view('blade.payment', compact('cars', 'branches'));
    }
}
