<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BuyerController extends Controller
{
    public function buyingcar(Request $request, $id)
    {
        $data = $request->validate([
            'buyer_name' => 'required',
            'selling' => 'required',
            'payment' => 'required',
            'balance' => 'required',
            'buyer_ph' => 'required',
            'buyer_nrc' => 'required',
            'document' => 'required|file|mimes:jpeg,png,pdf',
        ]);

        $buyer = new Buyer($data);
        $buyer->car_id = $id;

        $buyer->buyer_name = $request->input('buyer_name');
        $buyer->selling = $request->input('selling');
        $buyer->payment = $request->input('payment');
        $buyer->balance = $request->input('balance');
        $buyer->buyer_ph = $request->input('buyer_ph');
        $buyer->buyer_nrc = $request->input('buyer_nrc');

        $document = $request->file('document');
        if ($document) {
            $imagename = time() . '.' . $document->getClientOriginalExtension();
            $document->store('documentphoto');
            $buyer->document = 'documentphoto/' . $imagename;

            $buyer->save();



            return redirect()->back()->with('soldout', 'Car is Sold Out');
        }
    }
}
