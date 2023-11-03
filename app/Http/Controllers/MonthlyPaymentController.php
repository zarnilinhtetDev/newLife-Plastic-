<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\MonthlyPayment;

class MonthlyPaymentController extends Controller
{
    public function monthly_payment()
    {
        $pay = MonthlyPayment::all();
        return view('blade.monthlyPayment', compact('pay')); // Pass the cars to the view
    }

    public function monthly_payment_register()
    {
        $cars = Car::all();
        return view('blade.monthlyPaymentRegister', compact('cars'));
    }

    public function monthly_payment_store(Request $request)
    {
        $request->validate([
            'company_pay' => 'required',
            'company_date' => 'required',
            'owner_pay' => 'required',
            'owner_date' => 'required',
            'driver_pay' => 'required',
            'driver_date' => 'required',
            'car_expense' => 'required',

        ]);
        $payment = new MonthlyPayment([
            'company_pay' => $request->input('company_pay'),
            'company_date' => $request->input('company_date'),
            'owner_pay' => $request->input('owner_pay'),
            'owner_date' => $request->input('owner_date'),
            'driver_pay' => $request->input('driver_pay'),
            'driver_date' => $request->input('driver_date'),
            'car_expense' => $request->input('car_expense'),


        ]);
        $car = Car::find($request->input('car_id'));
        $car->payments()->save($payment);
        return redirect('monthly_payment')->with('success', 'Monthly Payment Successful');
    }
    public function paymentDelete($id)
    {

        $Delete = MonthlyPayment::find($id);
        $Delete->delete();
        return redirect()->back()->with('deleteStatus', 'Monthly Payment Delete is Successfully');
    }
    public function monthly_payment_show(Request $request, $id)
    {
        $data = MonthlyPayment::find($id);
        $cars = Car::all();
        return view('blade.monthly_payment_show', compact('data', 'cars'));
    }


    public function monthly_payment_update(Request $request, $id)
    {
        $data = MonthlyPayment::find($id);

        if ($data->car_id != $request->car_id) {
            $data->car()->associate(Car::find($request->car_id));
        }

        $data->update([
            'company_pay' => $request->input('company_pay'),
            'company_date' => $request->input('company_date'),
            'owner_pay' => $request->input('owner_pay'),
            'owner_date' => $request->input('owner_date'),
            'driver_pay' => $request->input('driver_pay'),
            'driver_date' => $request->input('driver_date'),
            'car_expense' => $request->input('car_expense'),
        ]);

        return redirect('/monthly_payment')->with('update', 'Monthly Payment updated successfully');
    }
}
