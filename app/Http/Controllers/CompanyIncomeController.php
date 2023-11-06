<?php

namespace App\Http\Controllers;

use App\Models\CompanyIncome;
use Illuminate\Http\Request;

class CompanyIncomeController extends Controller
{

    public function company()
    {
        $companyIncome = CompanyIncome::latest()->get();
        return view('blade.company_income.companyIncome', compact('companyIncome'));
    }

    public function incomeRegister(Request $request)
    {

        request()->validate([
            'company_date' => 'required',
            'company_price' => 'required',
        ]);

        $income = new CompanyIncome();
        $income->company_date = $request->company_date;
        $income->company_price = $request->company_price;
        $income->company_description = $request->company_description;

        $income->save();
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
        $income = CompanyIncome::find($id);
        return view('blade.company_income.companyIncomeEdit', compact('income'));
    }

    public function update(Request $request, $id)
    {
        $companyIncome = CompanyIncome::find($id);
        $companyIncome->company_date = $request->company_date;
        $companyIncome->company_price = $request->company_price;
        $companyIncome->company_description = $request->company_description;

        $companyIncome->update();
        return redirect('company_income')->with('updateStatus', 'Company Income Update is Successfull');
    }
}
