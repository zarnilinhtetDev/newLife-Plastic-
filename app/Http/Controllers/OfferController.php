<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function offer_price(Request $request, $id)
    {

        $validation = request()->validate([
            'offer_price' => 'required'
        ]);
        $carId = $request->input('car_id');
        $car = Car::find($id);
        if ($car) {
            $offer = new Offer($validation);
            $offer->car_id = $car->id;
            $offer->save();
        }
        return redirect()->back()->with('offerSuccess', 'Add Offer Price is Successful');
}
}
