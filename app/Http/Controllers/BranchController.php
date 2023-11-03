<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    //branch Register
    public function branchRegister()
    {
        $companies = Company::all();
        return view('blade.branchRegister', compact('companies'));
    }

    //branch List
    public function branch()
    {
        $showBranch_data = Branch::with('company')->latest()->get();
        return view('blade.branch', compact('showBranch_data'));
    }


    public function branchStore(Request $request)
    {
        $branchData = $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'address' => 'required',
            'location' => 'required',
            'company_id' => 'required', // Ensure that company_id is required
        ]);

        $branch = new Branch($branchData);
        $company = Company::find($request->input('company_id'));

        $company->branches()->save($branch);

        return redirect('/branch_list')->with('status', "Branch registered successfully");
    }

    //branch delete
    public function delete($id)
    {
        $branchDelete = Branch::find($id);
        $branchDelete->delete();
        $branchDeletename = $branchDelete->name;
        return redirect()->back()->with('deleteStauts', "Branch Delete is Successfully");
    }


    public function edit($id)
    {
        $companies = Company::all();
        $branchEdit = Branch::find($id);
        return view('blade.branchEdit', compact('branchEdit', 'companies'));
    }

    //branch update
    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);
        if ($branch->company_id != $request->input('company_id')) {
            $branch->company()->associate(Company::find($request->input('company_id')));
        }

        $branch->update([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('branchList')->with('update', 'Branch updated successfully');
    }
    public function addCarBranch($id)
    {

        $branch = Branch::find($id);

        $cars = Car::all();

        return view('blade.addCarBranch', compact('cars', 'branch'));
    }


    public function associateCarBranch(Request $request, $id)
    {
        $carId = $request->input('car_id');
        $payment = $request->input('payment');
        $branch = Branch::find($id);

        if ($branch) {
            $branch->car_id = $carId;
            $branch->payment = $payment;
            $branch->save();

            return redirect()->route('branchList', ['id' => $id])->with('success_car', 'Car associated successfully.');
        } else {
            return redirect()->back()->with('error', 'Branch not found.');
        }
    }


    public function carBranchDelete($id)
    {
        $branch = Branch::find($id);


        $car = $branch->car;

        if (!$car) {
            return redirect()->back()->with('error', 'Car not associated with the branch.');
        }

        $branch->car()->dissociate();
        $branch->save();

        return redirect()->back()->with('success_car', 'Car disassociated successfully from the branch.');
    }
}
