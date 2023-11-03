<?php

namespace App\Http\Controllers;

use App\Exports\DriversExport;
use App\Imports\DriversImport;
use App\Models\Driver;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DriverController extends Controller
{
    public function drivers()
    {
        $drivers =  Driver::latest()->get();
        return view('blade.driver', compact('drivers'));
    }
    public function drivers_store(Request $request)
    {
        $request->validate([
            'driver_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'driver_nrc' => 'required',
            'driver_pay' => 'required',


            'driver_id_front' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for image files
            'driver_id_back' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation rules for image files
        ]);

        $car = new Driver();
        $car->driver_name = $request->input('driver_name');
        $car->phone_number = $request->input('phone_number');
        $car->address = $request->input('address');
        $car->driver_nrc = $request->input('driver_nrc');
        $car->driver_pay = $request->input('driver_pay');


        // Upload Car Image
        if ($request->hasFile('driver_id_front')) {
            $driver_id_front = $request->file('driver_id_front');
            $driver_id_frontName = time() . '.' . $driver_id_front->getClientOriginalExtension();
            $driver_id_front->move('driverFront', $driver_id_frontName);
            $car->driver_id_front = $driver_id_frontName;
        }

        // Upload Driver ID Back
        if ($request->hasFile('driver_id_back')) {
            $driver_id_back = $request->file('driver_id_back');
            $driver_id_backName = time() . '.' . $driver_id_back->getClientOriginalExtension();
            $driver_id_back->move('driverBack', $driver_id_backName);
            $car->driver_id_back = $driver_id_backName;
        }

        $car->save();

        return redirect('/Driver')->with('success', 'Driver registered successfully');
    }
    public function delete_driver($id)
    {
        $driver_delete = Driver::find($id);
        $driver_delete->delete();

        return redirect()->back()->with('delete_success', ' Car delete is successful');
    }
    public function edit_driver($id)
    {
        $editDriver = Driver::find($id);
        return view('blade.driverEdit', compact('editDriver'));
    }
    public function update_driver(Request $request, $id)
    {
        // Find the driver by ID
        $car = Driver::find($id);

        $car->driver_name = $request->input('driver_name');
        $car->phone_number = $request->input('phone_number');
        $car->address = $request->input('address');
        $car->driver_pay = $request->input('driver_pay');

        $car->driver_nrc = $request->input('driver_nrc');



        $driver_id_front = $request->file('driver_id_front');
        if ($driver_id_front) {
            $owner_id_front_name = time() . '.' . $driver_id_front->getClientOriginalExtension();
            $driver_id_front->move('driverFront', $owner_id_front_name);
            $car->driver_id_front = $owner_id_front_name;
        }

        // Upload Owner ID Back
        $driver_id_back = $request->file('driver_id_back');
        if ($driver_id_back) {
            $owner_id_back_name = time() . '.' . $driver_id_back->getClientOriginalExtension();
            $driver_id_back->move('driverBack', $owner_id_back_name);
            $car->driver_id_back = $owner_id_back_name;
        }

        // Save the updated driver information
        $car->save();

        return redirect('/Driver')->with('success', 'Driver information updated successfully');
    }

    //Excel
    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt|max:2048', // Add validation rules for file uploads
        ]);

        $path = $request->file('file')->store('temp');

        \Maatwebsite\Excel\Facades\Excel::import(new DriversImport, storage_path('app/' . $path));

        return back()->with('success_driver', 'Drivers imported successfully.');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function fileExport()
    {
        return \Maatwebsite\Excel\Facades\Excel::download(new DriversExport, 'drivers.xlsx');
    }
}
