<?php


namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\DriverAttendance;
use Illuminate\Http\Request;

use Carbon\Carbon;

class DriverAttendanceController extends Controller
{
    public function driver_attendance($id)
    {
        $driver = Driver::find($id);

        return view('blade.driverAttendance', compact('driver'));
    }

    public function DriverAttendanceStore(Request $request, $id)
    {
        $data = $request->validate([
            'start_image' => 'required|image',
            'start_time' => 'required',
        ]);

        $driver = Driver::find($id);
        $driverAttendance = new DriverAttendance([
            'start_time' => $request->start_time,
        ]);

        if ($request->hasFile('start_image')) {
            $image = $request->file('start_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('startImage', $imageName);
            $driverAttendance->start_image = $imageName;
        }

        $driver->driverAttendances()->save($driverAttendance);

        return redirect()->back()->with('success', 'Start attendance recorded successfully');
    }

    public function DriverAttendanceEnd(Request $request, $id)
    {
        $request->validate([
            'end_image' => 'required|image',
            'end_time' => 'required',
        ]);

        $driver = Driver::find($id);
        $driverAttendance = $driver->driverAttendances()->latest()->first();

        if (!$driverAttendance) {
            $driverAttendance = new DriverAttendance();
        }

        $driverAttendance->end_time = $request->end_time;

        if ($request->hasFile('end_image')) {
            $image = $request->file('end_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('endImage', $imageName);
            $driverAttendance->end_image = $imageName;
        }

        $driver->driverAttendances()->save($driverAttendance);

        return redirect()->back()->with('success', 'End attendance recorded successfully');
    }

    public function filter(Request $request, $id)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $driver = Driver::find($id);

        $d_Attendance = $driver->driverAttendances()
            ->whereDate('start_time', '>=', $start_date)
            ->whereDate('start_time', '<=', $end_date)
            ->get();

        return view('blade.driverAttendance', compact('d_Attendance', 'driver'));
    }

    public function delete($id)
    {
        $driver = DriverAttendance::find($id);
        $driver->delete();
        return redirect()->back()->with('deleteStatus', 'Driver attendance delete is successfully');
    }

    public function show($id)
    {
        $driverAttendanceShow = DriverAttendance::find($id);

        return view('blade.driverAttendanceEdit', compact('driverAttendanceShow'));
    }

    public function update(Request $request, $id)
    {

        $driverAttendance = DriverAttendance::find($id);

        $driverAttendance->start_time = $request->start_time;
        if ($request->hasFile('start_image')) {
            $image = $request->file('start_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('startImage', $imageName);
            $driverAttendance->start_image = $imageName;
        }
        $driverAttendance->end_time = $request->end_time;
        if ($request->hasFile('end_image')) {
            $image = $request->file('end_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('endImage', $imageName);
            $driverAttendance->end_image = $imageName;
        }

        $driverAttendance->save();
        return redirect()->back()->with('updateStatus', 'Driver attendance update is successfully');
    }
}
