<?php

namespace App\Http\Controllers;

use App\Models\AddPayment;
use App\Models\Car;
use Illuminate\Http\Request;

class AddPaymentController extends Controller
{

    public function add_pay($id)
    {
        $payment = AddPayment::find($id);
        $car = Car::find($id);
        $pay = AddPayment::all();

        $totalAmount = AddPayment::sum('add_payment');
      return view('blade.cars.add_payment',compact('payment','car','pay','totalAmount'));
    }

    public function Add_Payment(Request $request, $id)
    {
        $validation = request()->validate([
            'add_payment' => 'required',
            'payment_date' => 'required'
        ]);
        $carId = $request->input('car_id');
        $car = Car::find($id);
        if ($car) {
            $payment = new AddPayment($validation);
            $payment->car_id = $car->id;
            $payment->save();
        }
        return redirect()->back()->with('payment_store', 'Add Payment Price is Successful');
    }
}
