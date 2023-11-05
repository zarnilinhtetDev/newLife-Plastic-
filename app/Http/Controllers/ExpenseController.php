<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense()
    {
        $expense = Expense::latest()->get();
        return view('blade.expense.expenses', compact('expense'));
    }

    public function register(Request $request)
    {

        $request->validate([
            'category' => 'required',
            'expense_name' => 'required',
            'expense_amount' => 'required',
        ]);

        $expense = new Expense();
        $expense->category = $request->category;
        $expense->expense_name = $request->expense_name;
        $expense->expense_amount = $request->expense_amount;

        $expense->save();
        return redirect()->back()->with('success', 'Expense Register is Successfull');
    }

    public function delete($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->back()->with('deleteStatus', 'Expense Delete is Successfull');
    }

    public function show($id)
    {

        $expenseData = Expense::find($id);
        return view('blade.expense.expensesEdit', compact('expenseData'));
    }

    public function update(Request $request, $id)
    {

        $expense = Expense::find($id);
        $expense->category = $request->category;
        $expense->expense_name = $request->expense_name;
        $expense->expense_amount = $request->expense_amount;

        $expense->update();
        return redirect('expense')->with('updateStatus', 'Expense Update is Successfull');
    }
}
