<?php

namespace App\Http\Controllers;

use App\Models\CompanyExpenses;
use Illuminate\Http\Request;

class CompanyExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = CompanyExpenses::latest()->get();
        return view('blade.compantExpenseShow', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blade.create_expenses');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'string|max:255',
            'company_vouncher' => 'image|max:2000',
            'amount' => 'required',
        ]);
        $expenses = new CompanyExpenses();
        $expenses->description = $request->description;
        $expenses->amount = $request->amount;

        $company_vouncher = $request->file('company_vouncher');
        if ($company_vouncher) {
            $imagename = time() . '.' . $company_vouncher->getClientOriginalExtension();
            $company_vouncher->move('companyvouncher', $imagename);
            $expenses->company_vouncher = $imagename;
        }
        $expenses->save();
        return redirect('/company_expenses')->with('success', 'Company Expenses created successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show($id)
    // {
    //     $expenses = CompanyExpenses::find($id);
    //     return view ('blade.show',compact('expenses'));
    // }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit($id)
    {
        $expense = CompanyExpenses::find($id);
        return view('blade.edit_expenses', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $expenses = CompanyExpenses::find($id);
        $request->validate([
            'description' => 'string|max:255',
            'company_vouncher' => 'image|max:2000',
            'amount' => 'required',
        ]);

        $expenses->description = $request->description;
        $expenses->amount = $request->amount;

        $company_vouncher = $request->file('company_vouncher');
        if ($company_vouncher) {
            $imagename = time() . '.' . $company_vouncher->getClientOriginalExtension();
            $company_vouncher->move('companyvouncher', $imagename);
            $expenses->company_vouncher = $imagename;
        }

        //Save the updated companyExpense information
        $expenses->save();
        return redirect()->route('companyExpenseList')->with('success', 'Company Expenses update created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $expenses = CompanyExpenses::findorfail($id);
        $expenses->delete();
        return redirect()->back()->with('deleteStatus', 'Company Expenses is successfully deleted');
    }
}
