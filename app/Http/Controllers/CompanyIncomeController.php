<?php

namespace App\Http\Controllers;

use App\Models\CompanyIncome;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CompanyIncomeController extends Controller
{

    public function company()
    {
        $transaction = Transaction::all();
        $companyIncome = CompanyIncome::with('transaction')->latest()->get();
        return view('blade.company_income.companyIncome', compact('companyIncome', 'transaction'));
    }

    public function incomeRegister(Request $request)
    {

        request()->validate([
            'company_date' => 'required',
            'company_price' => 'required',
            'transaction_id' => 'required',
        ]);

        $income = new CompanyIncome();
        $income->company_date = $request->company_date;
        $income->company_price = $request->company_price;
        $income->company_description = $request->company_description;

        $transaction = Transaction::find($request->input('transaction_id'));

        // if (!$transaction) {
        //     return redirect()->back()->with('error', 'Transaction not found');
        // }

        $transaction->companyIncome()->save($income);

        return redirect()->back()->with('success', 'Company Income Register is Successfull');
    }

    public function delete($id)
    {
        $income = CompanyIncome::find($id);
        $income->delete();
        return redirect()->back()->with('deleteStatus', 'Company Income Delete is Successfull');
    }

    public function show($id)
    {
        $transaction = Transaction::all();
        $income = CompanyIncome::find($id);
        return view('blade.company_income.companyIncomeEdit', compact('income', 'transaction'));
    }

    public function update(Request $request, $id)
    {

        $companyIncome = CompanyIncome::find($id);
        if ($companyIncome->transaction_id != $request->input('transaction_id')) {
            $companyIncome->account()->associate(Transaction::find($request->input('transaction_id')));
        }
        $companyIncome->update([
            'company_date' => $request->input('company_date'),
            'company_price' => $request->input('company_price'),
            'company_description' => $request->input('company_description'),
        ]);
        return redirect('company_income')->with('updateStatus', 'Company Income Update is Successfull');
    }
}
