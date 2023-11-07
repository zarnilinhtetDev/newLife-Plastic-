<?php

namespace App\Http\Controllers;

use App\Models\InOut;
use Illuminate\Http\Request;

class InOutController extends Controller
{
    public function inoutRegister(Request $request)
    {

        $request->validate([
            'paydate' => 'required',
            'payprice' => 'required',
            'paydescription' => 'required',
        ]);
        $inoutList = new InOut();
        $inoutList->paydate = $request->input('paydate');
        $inoutList->payprice = $request->input('payprice');
        $inoutList->paydescription = $request->input('paydescription');
        $inoutList->save();
        return redirect()->back()->with('success', 'Pay Register is Successfull');
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

    public function outregister(Request $request)
    {
        $request->validate([
            'yadate' => 'required',
            'yaprice' => 'required',
            'yadescription' => 'required',
        ]);
        $inoutList = new InOut();
        $inoutList->yadate = $request->input('yadate');
        $inoutList->yaprice = $request->input('yaprice');
        $inoutList->yadescription = $request->input('yadescription');
        $inoutList->save();
        return redirect()->back()->with('success', 'Ya Register is Successfull');
    }
}
