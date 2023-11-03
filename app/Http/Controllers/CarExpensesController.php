<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarExpenses;
use App\Models\Expense;
use Illuminate\Http\Request;

class CarExpensesController extends Controller
{
    public function car_expenses()
    {


        $expense = CarExpenses::with('car')->latest()->get();
        return view('blade.carExpense', compact('expense'));
    }
    public function carExpenseShow()
    {
        $cars = Car::all();
        return view('blade.carExpenseCreate', compact('cars'));
    }

    public function carExpenseStore(Request $request)
    {
        $request->validate([
            'description' => 'string|max:255',
            'car_vouncher' => 'image|max:2000',
            'amount' => 'required',
            'car_id' => 'required',
        ]);

        // Create a new CarExpense instance
        $carExpense = new CarExpenses();
        $carExpense->description  = $request->description;
        $carExpense->amount = $request->amount;

        $car_vouncher = $request->file('car_vouncher');
        if ($car_vouncher) {
            $imagename = time() . '.' . $car_vouncher->getClientOriginalExtension();
            $car_vouncher->move('carvouncher', $imagename);
            $carExpense->car_vouncher = $imagename;
        }

        // Find the associated Car model
        $car = Car::find($request->input('car_id'));

        // Save the car expense to the associated car
        $car->carExpenses()->save($carExpense);

        return redirect('/car_expenses')->with('status', "Car Expense registered successfully");
    }

    //carExpense delete
    public function delete($id)
    {

        $carExpenseDelete = CarExpenses::find($id);
        $carExpenseDelete->delete();
        return redirect()->back()->with('deleteStatus', 'CarExpense Delete is Successfully');
    }

    //carExpense edit
    public function edit($id)
    {
        $cars = Car::all();
        $carExpenseEdit = CarExpenses::find($id);
        return view('blade.carExpenseEdit', compact('carExpenseEdit', 'cars'));
    }

    //carExpense Update
    public function update(Request $request, $id)
    {

        $carExpense = CarExpenses::find($id);
        if ($carExpense->car_id != $request->input('car_id')) {
            $carExpense->car()->associate(Car::find($request->input('car_id')));
        }

        // $carExpense->update([
        //     'description' => $request->description,
        //     'car_vouncher' => $request->car_vouncher,
        //     'amount' => $request->amount,
        // ]);

        $carExpense->description = $request->description;
        $carExpense->amount = $request->amount;

        $car_vouncher = $request->file('car_vouncher');
        if ($car_vouncher) {
            $imagename = time() . '.' . $car_vouncher->getClientOriginalExtension();
            $car_vouncher->move('carvouncher', $imagename);
            $carExpense->car_vouncher = $imagename;
        }

        //Save the updated carExpense information
        $carExpense->save();


        return redirect()->route('carExpenseList')->with('updateStatus', 'CarExpense updated successfully');
    }
}
