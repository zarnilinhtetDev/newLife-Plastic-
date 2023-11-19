<?php

namespace App\Http\Controllers;

use App\Models\Tube;
use Illuminate\Http\Request;

class TubeController extends Controller
{
    public function tubes()
    {
        $tubes = Tube::latest()->get();
        return view('blade.tube.tubeRegister', compact('tubes'));
    }

    public function tubeStore(Request $request, Tube $tube)
    {
        $request->validate([
            'date' => 'required',
            'kaw1' => 'required',
            'kaw2' => 'required',
            'khote1' => 'required',
            'khote2' => 'required',
            'size1' => 'required',
            'size2' => 'required',
            'white24' => 'required',
            'blue24' => 'required',
            'white16' => 'required',
            'blue16' => 'required',
            'white25' => 'required',
            'blue25' => 'required',
            'white3' => 'required',
            'blue3' => 'required',
            'lightblue' => 'required',
            'darkblue' => 'required',
            'green' => 'required',
            'yellow' => 'required',
            'red' => 'required',
            'pink' => 'required',
            'black' => 'required',
            'white' => 'required',
        ]);

        $tube->create($request->all());

        return redirect('dashboard')->with('success', 'Register Successful');
    }
    public function delete_detail($id)
    {
        $tube = Tube::find($id);

        if (!$tube) {
            return redirect()->back()->with('deleteStatus', 'Record not found');
        }

        $tube->delete();

        return redirect()->back()->with('deleteStatus', 'Delete Successful');
    }

    public function edit($id)
    {
        $update = Tube::find($id);
        return view('blade.tube.update', compact('update'));
    }
    public function update(Request $request, $id)
    {
        $tubeupdate = Tube::find($id);


        $tubeupdate->update($request->all());

        return redirect('dashboard')->with('updateStatus', 'Update Successfully');
    }
}
