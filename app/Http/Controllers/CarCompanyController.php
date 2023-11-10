<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Car;
use App\Models\Offer;
use App\Models\Expense;

use App\Models\CarExpense;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Models\Transaction;

class CarCompanyController extends Controller
{
    public function show()
    {
        $car_expenses = CarExpense::all();
        $company_expenses = Expense::all();
        $car = Car::all();
        // return $company_expenses->all();

        return view('blade.car_company_expense.car_company_expnese', compact('car_expenses', 'company_expenses', 'car'));
    }

    public function filter(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $car_expenses = CarExpense::all();

        // Use Eloquent query to filter records by date range
        $search_company_expenses = Expense::whereDate('expense_date', '>=', $start_date)
            ->whereDate('expense_date', '<=', $end_date)
            ->get();

        return view('blade.car_company_expense.car_company_expnese', compact('car_expenses', 'search_company_expenses'));
    }
}
