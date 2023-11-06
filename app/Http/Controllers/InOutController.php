<?php

namespace App\Http\Controllers;

use App\Models\InOut;
use Illuminate\Http\Request;

class InOutController extends Controller
{
    public function inoutRegister(Request $request)
    {

        $request->validate([
            'date' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $inoutList = new InOut();
        $inoutList->date = $request->input('date');
        $inoutList->price = $request->input('price');
        $inoutList->description = $request->input('description');
        $inoutList->save();
        return redirect()->back()->with('success', 'Register is Successfull');
    }
    public function inout()
    {
        $inouts = InOut::all();
        return view('blade.inout.inout', compact('inouts'));
    }

    public function show($id)
    {
        $inout = InOut::find($id);
        return view('blade.inout.inout_edit', compact('inout'));
    }
    public function delete($id)
    {
        $inout = InOut::find($id);
        $inout->delete();
        return redirect()->back()->with('deleteStatus', 'InOut Delete is Successfull');
    }

    public function update(Request $request, $id)
    {
        $inout = InOut::find($id);

        $inout->date = $request->date;
        $inout->price = $request->price;
        $inout->description = $request->description;



        $inout->update();

        return redirect('/inout')->with('updateStatus', ' Update is Successfull');
    }
}
