<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\CarExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarExpenseController extends Controller
{
    public function car_expense($id)
    {
        $car = Car::findOrFail($id);
        $buy = Buy::find($id);
        $expenses = CarExpense::latest()->get();

        return view('blade.cars.carExpense', compact('car', 'expenses', 'buy'));
    }

    public function car_expense_store(Request $request, $id)
    {
        $data = $request->validate([
            'description' => 'required',
            'expense_price' => 'required|numeric',
        ]);

        $car = Car::findOrFail($id);

        $carExpense = new CarExpense($data);
        $car->carExpenses()->save($carExpense);

        return redirect()->back()->with('success', 'Car expense added successfully');
    }
    public function delete($id)
    {

        $expense = CarExpense::findOrFail($id);
        $expense->delete();

        return redirect()->back()->with('deleteStatus', 'Expense deleted successfully');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'description' => 'required',
            'expense_price' => 'required|numeric',
        ]);
        $carExpense = CarExpense::findOrFail($id);
        $carExpense->update($data);

        return redirect()->back()->with('success', 'Car Expense updated successfully');
    }
}
