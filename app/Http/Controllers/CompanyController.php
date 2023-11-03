<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Exports\CompanyExport;
use App\Imports\CompanyImport;
use Maatwebsite\Excel\Facades\Excel;

class CompanyController extends Controller
{


    //company register-view
    public function companyRegister()
    {
        $branch = Branch::all();
        return view('blade.companyRegister', compact('branch'));
    }

    //company data-store
    public function companydata_store()
    {
        $companyData = request()->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'address' => 'required',
            // 'branch' => 'required',

        ]);
        Company::create($companyData);
        return redirect('/company_list')->with('status', "Company Register is successfully");
    }
    //company list
    public function company()
    {
        $showCompany_data =  Company::latest()->get();
        return view('blade.company', compact('showCompany_data'));
    }

    //company delete
    public function delete($id)
    {
        $companyDelete = Company::find($id);
        $companyDelete->delete();
        $companyDeleteName = $companyDelete->name;
        return redirect()->back()->with('deleteStatus', "Company Delete is Successfully");
    }

    //company edit
    public function edit($id)
    {
        $companyEdit = Company::find($id);
        return view('blade.companyEdit', compact('companyEdit'));
    }

    //company update
    public function update(Request $request, $id)
    {
        $companyUpdate = Company::find($id);
        $companyUpdate->name = $request->name;
        $companyUpdate->phone_number = $request->phone_number;
        $companyUpdate->email = $request->email;
        $companyUpdate->address = $request->address;
        // $companyUpdate->branch = $request->branch;
        $companyUpdate->update();
        return redirect('/company_list')->with('updateStatus', "Company Update is Successfully");
    }




    public function fileImportExport()
    {
        return view('file-import');
    }

    /**
     * Import a file and store it temporarily before processing.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function fileImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv,txt|max:2048', // Add validation rules for file uploads
        ]);

        $path = $request->file('file')->store('temp');

        Excel::import(new CompanyImport, storage_path('app/' . $path));

        return back()->with('success', 'File imported successfully.');
    }


    public function fileExport()
    {
        return Excel::download(new CompanyExport, 'company.xlsx');
    }
}
