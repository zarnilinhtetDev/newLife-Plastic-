<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function buying_price(Request $request, $id)
    {

        $validation = request()->validate([
            'price' => 'required'
        ]);
        $carId = $request->input('car_id');
        $car = Car::find($id);
        if ($car) {
            $buy = new Buy($validation);
            $buy->car_id = $car->id;
            $buy->save();
        }
        return redirect()->back()->with('buySuccess', 'Add Buying Price is Successful');
    }
}
