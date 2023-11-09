<?php

namespace App\Http\Controllers;

use App\Models\InOut;
use Illuminate\Http\Request;

class InOutController extends Controller
{
    public function inRegister(Request $request)
    {

        $list = new InOut();
        $list->date = $request->input('date');
        $list->price = $request->input('price');
        $list->description = $request->input('description');
        $list->save();

        return redirect()->back()->with('success', 'ရရန် Register is Successfull');
    }

    public function outRegister(Request $request)
    {

        $inoutList = new InOut();
        $inoutList->out_date = $request->input('out_date');
        $inoutList->out_price = $request->input('out_price');
        $inoutList->out_description = $request->input('out_description');
        $inoutList->save();
        return redirect()->back()->with('success', 'ပေးရန် Register is Successfull');
    }
    public function inout()
    {
        $inouts = InOut::all();
        return view('blade.inout.inout', compact('inouts'));
    }

    // public function out()
    // {
    //     $out = InOut::all();
    //     return view('blade.inout.inout', compact('out'));
    // }


    public function show($id)
    {
        $inout = InOut::find($id);
        return view('blade.inout.inout_edit', compact('inout'));
    }

    public function outShow($id)
    {
        $out = InOut::find($id);
        return view('blade.inout.out_edit', compact('out'));
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

        return redirect('/inout')->with('updateStatus', ' ရရန် Update is Successfull');
    }

    public function outUpdate(Request $request, $id)
    {
        $inout = InOut::find($id);

        $inout->out_date = $request->out_date;
        $inout->out_price = $request->out_price;
        $inout->out_description = $request->out_description;

        $inout->update();

        return redirect('/inout')->with('updateStatus', ' ‌ပေးရန် Update is Successfull');
    }
}
