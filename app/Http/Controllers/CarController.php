<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Exports\CarExport;
use App\Imports\CarImport;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class CarController extends Controller
{
    public function cars()
    {

        return view('blade.carRegister');
    }
    public function car_store(Request $request)
    {
        request()->validate([
            "car_brand_name" => 'required',
            "car_type" => 'required',
            'car_model' => 'required',
            'car_model_year' => 'required',
            'car_color' => 'required',
            // 'car_capacity' => 'required',
            'plate_number' => 'required',
            'mileage' => 'required',
            'car_image' => 'required',
            'owner_name' => 'required',
            'phone_number' => 'required',
            'owner_id_front' => 'required',
            'owner_id_back' => 'required',
            // 'fuel_type' => 'required',
            'engine_power' => 'required',
            'nrc_number' => 'required',
            'address' => 'required',
            'owner_pay' => 'required',




        ]);
        $car = new Car();
        $car->car_brand_name = $request->car_brand_name;
        $car->car_type = $request->car_type;
        $car->car_model = $request->car_model;
        $car->car_model_year = $request->car_model_year;
        $car->car_color = $request->car_color;
        $car->plate_number = $request->plate_number;
        $car->mileage = $request->mileage;
        $car->owner_name = $request->owner_name;
        $car->phone_number = $request->phone_number;
        $car->message = $request->message;

        $car->engine_power = $request->engine_power;
        $car->nrc_number = $request->nrc_number;
        $car->address = $request->address;
        $car->owner_pay = $request->owner_pay;


        $car_image = $request->file('car_image');
        if ($car_image) {
            $imagename = time() . '.' . $car_image->getClientOriginalExtension();
            $car_image->move('carimage', $imagename);
            $car->car_image = $imagename;
        }

        // Upload Owner ID Front
        $owner_id_front = $request->file('owner_id_front');
        if ($owner_id_front) {
            $owner_id_front_name = time() . '.' . $owner_id_front->getClientOriginalExtension();
            $owner_id_front->move('frontID', $owner_id_front_name);
            $car->owner_id_front = $owner_id_front_name;
        }

        // Upload Owner ID Back
        $owner_id_back = $request->file('owner_id_back');
        if ($owner_id_back) {
            $owner_id_back_name = time() . '.' . $owner_id_back->getClientOriginalExtension();
            $owner_id_back->move('backID', $owner_id_back_name);
            $car->owner_id_back = $owner_id_back_name;
        }

        $car->save();

        return redirect('/dashboard')->with('success', 'Car Register is successful');
    }

    //Delete Car
    public function delete_car($id)
    {
        $car_delete = Car::find($id);
        $car_delete->delete();

        return redirect()->back()->with('delete_success', ' Car delete is successful');
    }

    //Edit Car
    public function edit_car($id)
    {
        $carEdit = Car::find($id);
        return view('blade.carEdit', compact('carEdit'));
    }


    public function update_car(Request $request, $id)
    {


        $car = Car::find($id);
        $car->car_brand_name = $request->car_brand_name;
        $car->car_type = $request->car_type;
        $car->car_model = $request->car_model;
        $car->car_model_year = $request->car_model_year;
        $car->car_color = $request->car_color;
        // $car->car_capacity = $request->car_capacity;
        $car->plate_number = $request->plate_number;
        $car->mileage = $request->mileage;
        $car->owner_name = $request->owner_name;
        $car->phone_number = $request->phone_number;
        $car->message = $request->message;
        // $car->fuel_type = $request->fuel_type;
        $car->engine_power = $request->engine_power;
        $car->nrc_number = $request->nrc_number;
        $car->address = $request->address;
        $car->owner_pay = $request->owner_pay;


        // Upload Car Image
        $car_image = $request->file('car_image');
        if ($car_image) {
            $imagename = time() . '.' . $car_image->getClientOriginalExtension();
            $car_image->move('carimage', $imagename);
            $car->car_image = $imagename;
        }

        // Upload Owner ID Front
        $owner_id_front = $request->file('owner_id_front');
        if ($owner_id_front) {
            $owner_id_front_name = time() . '.' . $owner_id_front->getClientOriginalExtension();
            $owner_id_front->move('frontID', $owner_id_front_name);
            $car->owner_id_front = $owner_id_front_name;
        }

        // Upload Owner ID Back
        $owner_id_back = $request->file('owner_id_back');
        if ($owner_id_back) {
            $owner_id_back_name = time() . '.' . $owner_id_back->getClientOriginalExtension();
            $owner_id_back->move('backID', $owner_id_back_name);
            $car->owner_id_back = $owner_id_back_name;
        }

        $car->save();

        return redirect('/dashboard')->with('update_success', 'Update Car is Successful....');
    }
    public function carDetail($id)
    {
        $data = Car::find($id);
        return view('blade.carDetail', compact('data'));
    }


    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt|max:2048',
        ]);

        try {
            $path = $request->file('file')->store('temp');
            Excel::import(new CarImport, storage_path('app/' . $path));

            return back()->with('success', 'File imported successfully.');
        } catch (ValidationException $e) {

            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {

            return back()->with('error', 'An error occurred during the import process.');
        }
    }

    public function fileExport()
    {
        return Excel::download(new CarExport, 'cars.xlsx');
    }

    //Click the button driver id and car id are connect

    public function addDriver($id)
    {
        $car = Car::find($id);
        $drivers = Driver::all();

        return view('blade.addDriver', compact('car', 'drivers'));
    }


    public function associateDriver(Request $request, $id)
    {
        $driverId = $request->input('driver_id');
        $car = Car::find($id);

        if ($car) {
            $car->driver()->associate($driverId);
            $car->save();
            return redirect('/dashboard')->with('success_driver', 'Driver associated successfully.');
        } else {
            return redirect()->back()->with('error', 'Car not found.');
        }
    }
    public function disassociateDriver($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->driver_id = null;
        $car->save();
        return back();
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('blade.paymentEdit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        $car->owner_pay = $request->input('owner_payment');
        if ($car->branch) {
            $car->branch->payment = $request->input('company_payment');
            $car->branch->save();
        }

        if ($car->driver) {
            $car->driver->driver_pay = $request->input('driver_payment');
            $car->driver->save();
        }

        $car->save();

        return redirect('/payment')->with('updateStatus', 'Car payment details updated successfully');
    }

    public function destroy(Car $car)
    {
        // Delete company payment
        if ($car->branch) {
            $car->branch->delete();
        }

        // Delete driver payment
        if ($car->driver) {
            $car->driver->delete();
        }

        // Delete the car
        $car->delete();

        return redirect('/payment')->with('success', 'Car and associated payments deleted successfully.');
    }
}
