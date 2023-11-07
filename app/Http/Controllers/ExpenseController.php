<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function expense()
    {
        $expense = Expense::latest()->get();
        $expenseCategory = ExpenseCategory::all();
        return view('blade.expense.expenses', compact('expense', 'expenseCategory'));
    }

    public function register(Request $request)
    {

        $request->validate([
            'category' => 'required',
            'expense_date' => 'required',
            'expense_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        ]);

        $expense = new Expense();
        $expense->category = $request->category;
        $expense->expense_date = $request->expense_date;
        $expense->expense_description = $request->expense_description;
        $expense->expense_price = $request->expense_price;


        $expense->save();
        return redirect()->back()->with('success', 'Company Expense Register is Successfull');
    }

    public function delete($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return redirect()->back()->with('deleteStatus', 'Company Expense Delete is Successfull');
    }

    public function show($id)
    {

        $expenseData = Expense::find($id);
        $expenseCategory = ExpenseCategory::all();
        return view('blade.expense.expensesEdit', compact('expenseData', 'expenseCategory'));
    }

    public function update(Request $request, $id)
    {

        $expense = Expense::find($id);
        $expense->category = $request->category;
        $expense->expense_date = $request->expense_date;
        $expense->expense_description = $request->expense_description;
        $expense->expense_price = $request->expense_price;

        $expense->update();
        return redirect('expense')->with('updateStatus', 'Company Expense Update is Successfull');
    }
    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $expenseCategory = ExpenseCategory::all();


        $companyExpense = Expense::whereDate('expense_date', '>=', $start_date)
            ->whereDate('expense_date', '<=', $end_date)
            ->get();

        return view('blade.expense.expenses', compact('companyExpense', 'expenseCategory'));
    }
}
