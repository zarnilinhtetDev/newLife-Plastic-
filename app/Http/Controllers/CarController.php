<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

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
        return view('blade.cars.carDetail', compact('carDetail'));
    }
}
