<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\Buyer;
use App\Models\Offer;
use App\Models\AddPayment;
use App\Models\CarExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{


    public function carsRegister(Request $request)
    {
        $request->validate([
            "car_type" => "required",
            "car_model" => "required",
            "car_number" => "required",
            "manufacture_year" => "required|integer",
            "License_expire" => "required",
            "car_color" => "required",
            "car_images" => "required",

        ]);

        $car = new Car();
        $car->car_type = $request->input('car_type');
        $car->car_model = $request->input('car_model');
        $car->car_number = $request->input('car_number');
        $car->manufacture_year = $request->input('manufacture_year');
        $car->License_expire = $request->input('License_expire');
        $car->car_color = $request->input('car_color');
        $car->description = $request->input('description', '');
        $car_images = $request->file('car_images');
        if ($car_images) {
            $imagename = time() . '.' . $car_images->getClientOriginalExtension();
            $car_images->move('carimage', $imagename);
            $car->car_images = $imagename;
        }


        $car->save();

        return redirect()->back()->with('success', 'Car Registration Successful');
    }

    public function delete($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect()->back()->with('deleteStatus', 'Car Delete is Successfull');
    }

    public function show($id)
    {
        $carShow = Car::find($id);
        return view('blade.cars.carsEdit', compact('carShow'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        $car->car_type = $request->car_type;
        $car->car_model = $request->car_model;
        $car->car_number = $request->car_number;
        $car->manufacture_year = $request->manufacture_year;
        $car->License_expire = $request->License_expire;

        $car->car_color = $request->car_color;
        $car->description = $request->description;

        $car_images = $request->file('car_images');
        if ($car_images) {
            $imagename = time() . '.' . $car_images->getClientOriginalExtension();
            $car_images->move('carimage', $imagename);
            $car->car_images = $imagename;
        }

        $car->update();

        return redirect('/dashboard')->with('updateStatus', 'Car Update is Successfull');
    }
    public function car_detail($id)
    {
        $carDetail = Car::find($id);
        $buyprice = Buy::where('car_id', $carDetail->id)
            ->orderBy('created_at', 'desc')
            ->first();
        $offerprice =
            Offer::where('car_id', $carDetail->id)
            ->orderBy('created_at', 'desc')
            ->first();

        $carstatus = Buyer::find($id);
        $carexpenses = CarExpense::all();
        return view('blade.cars.carDetail', compact('carDetail', 'buyprice', 'offerprice', 'carstatus', 'carexpenses'));
    }

    public function soldcar()
    {
        $buyers = Buyer::with('car')
            ->latest()
            ->get();

        $firstBuyer = $buyers->first();

        $result = Car::select('cars.car_type', 'cars.car_model', 'cars.car_number', 'buys.price', 'buyers.selling', 'buyers.payment', 'buyers.balance', 'car_expenses.expense_price')
            ->join('buys', 'cars.id', '=', 'buys.car_id')
            ->join('buyers', 'cars.id', '=', 'buyers.car_id')
            ->join('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
            ->where('cars.id', $firstBuyer->car->id)
            ->first();
        $data = Car::select(
            'cars.car_type',
            'cars.car_model',
            'cars.car_number',
            DB::raw('MAX(buys.price) as max_price'),
            DB::raw('MAX(buyers.selling) as max_selling'),
            DB::raw('MAX(buyers.payment) as max_payment'),
            DB::raw('MAX(buyers.balance) as max_balance'),
            DB::raw('SUM(car_expenses.expense_price) as total_expense_price')
        )
            ->join(
                'buys',
                'cars.id',
                '=',
                'buys.car_id'
            )
            ->join('buyers', 'cars.id', '=', 'buyers.car_id')
            ->leftJoin('car_expenses', 'cars.id', '=', 'car_expenses.car_id')
            ->where('cars.id', $firstBuyer->car->id)
            ->groupBy('cars.id')
            ->first();

        return view('blade.cars.Sold_Out', compact('buyers', 'result', 'data'));
    }


    public function Soldout_Detail($id)
    {
        $buyer = Buyer::find($id);
        $cardata = Car::find($id);
        $buy = Buy::find($id);
        $pay = AddPayment::find($id);
        $carExpenses = CarExpense::where('car_id', $cardata->id)->get();
        $totalExpense = $carExpenses->sum('expense_price');
        $totalAmount = AddPayment::sum('add_payment');
        return view('blade.cars.Sold_Out_Detail', compact('buyer', 'cardata', 'buy', 'pay', 'totalExpense', 'totalAmount'));
    }
}
