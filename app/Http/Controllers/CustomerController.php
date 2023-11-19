<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::latest()->get();
        return view('blade.customers.customer', compact('customers'));
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',

        ]);

        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->amount = $request->input('amount');
        $customer->category = $request->input('category');
        $customer->price = $request->input('price');
        $customer->remark = $request->input('remark');

        $customer->save();

        return redirect()->back()->with('success', 'Customer created successfully');
    }
    public function delete($id)
    {
        $delete = Customer::find($id);
        $delete->delete();
        return back()->with('deleteStatus', 'Customer Delete Successfully');
    }
    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $customers = Customer::whereBetween('created_at', [$start_date, $end_date])
            ->get();

        return view('blade.customers.customer', compact('customers'));
    }
    public function update(Request $request, $id)
    {
        $customerupdate = Customer::find($id);


        $customerupdate->update($request->all());

        return redirect('/customers')->with('updateStatus', 'Update Successfully');
    }
    public function dailyShow()
    {

        $today = now();
        $todayDate = $today->toDateString();

        $dailyData = DB::table('customers')
            ->whereDate('created_at', $todayDate)
            ->get();

        $todayTotal = Customer::whereDate('created_at', Carbon::today())->sum('price');

        return view('blade.customers.daily_customer', compact('dailyData', 'todayTotal'));
    }
}
