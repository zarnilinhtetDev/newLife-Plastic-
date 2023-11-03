<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expenses()
    {
        $expenses = Expense::latest()->get();
        return view('blade.expense', compact('expenses'));
    }
    public function expenses_store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'amount' => 'required',
            'branch' => 'required',
            'message' => 'nullable|string',
        ]);
        $expense = new Expense($validatedData);
        $expense->save();

        return redirect()->back()->with('success', 'Expense is successful');
    }

    public function delete_expense($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->back()->with('delete_success', ' Expense delete  successful');
    }
    public function edit_expense($id)
    {
        $expense = Expense::find($id);

        return view('blade.expenseEdit', compact('expense'));
    }
    public function update_expense(Request $request, $id)
    {

        $validatedData = $request->validate([
            'amount' => 'required',
            'branch' => 'required',


        ]);


        $expense = Expense::find($id);



        $expense->update([
            'amount' => $validatedData['amount'],
            'branch' => $validatedData['branch'],
            'message' => $validatedData['branch'],

        ]);

        return redirect('/Expenses')->with('expenseSuccess', 'Expense updated successfully');
    }
}
