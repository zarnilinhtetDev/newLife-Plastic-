<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::latest()->get();
        return view('blade.customer.customer', compact('customers'));
    }
    public function customer_store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'message' => 'required',
        ]);

        Customer::create($validatedData);

        return redirect()->back()->with('customer_store', 'Customer registered successfully');
    }
    public function customer_delete($id)
    {
        $delete = Customer::find($id);
        $delete->delete();

        return redirect()->back()->with('customer_delete', 'Customer Delete Successful');
    }
    public function customer_show($id)
    {
        $showCustomer = Customer::find($id);

        return view('blade.customer.customerShow', compact('showCustomer'));
    }
    public function customer_update(Request $request, $id)
    {
        $update = Customer::find($id);
        $update->customer_name = $request->input('customer_name');
        $update->phone_number = $request->input('phone_number');
        $update->address = $request->input('address');
        $update->city = $request->input('city');
        $update->message = $request->input('message');
        $update->update();
        return redirect()->route('customer')->with('customer_update', 'Customer Updated Successfully');
    }
}
