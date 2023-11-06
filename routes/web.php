<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\CarExpenseController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CarExpensesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\MonthlyPaymentController;
use App\Http\Controllers\CompanyExpensesController;
use App\Http\Controllers\CompanyIncomeController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\DriverAttendanceController;
use App\Http\Controllers\InOutController;
use App\Http\Controllers\OfferController;
use App\Models\CarExpense;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'adminLogin'])->name('admin. login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout']);




Route::get('/dashboard', function () {
    $car = Car::latest()->get();
    return view('dashboard', compact('car'));
})->name('dashboard');

Route::controller(CustomerController::class)->group(function () {
    Route::get('customer', 'customer')->name('customer');
    Route::post('customer_register', 'customer_store');
    Route::get('customer/delete/{id}', 'customer_delete');
    Route::get('customer_show/{id}', 'customer_show');
    Route::post('customer_update/{id}', 'customer_update');
});

//Car
Route::post('/cars_register', [CarController::class, 'carsRegister']);
Route::get('/cars_delete/{id}', [CarController::class, 'delete']);
Route::get('/cars_show/{id}', [CarController::class, 'show']);
Route::post('/cars_update/{id}', [CarController::class, 'update']);
Route::get('/Car_Detail/{id}', [CarController::class, 'car_detail']);

//Car Buy
Route::post('/Buying_Price/{id}', [BuyController::class, 'buying_price']);

//Car Offer
Route::post('/Offer_Price/{id}', [OfferController::class, 'offer_price']);

//Car Expense
Route::get('/car_expense/{id}', [CarExpenseController::class, 'car_expense']);
Route::post('/car_expense_store/{id}', [CarExpenseController::class, 'car_expense_store']);
Route::get('/expense/delete/{id}', [CarExpenseController::class, 'delete'])->name('delete.expense');
Route::post('/expense/edit/{id}', [CarExpenseController::class, 'update']);


//Account
Route::get('account', [AccountController::class, 'account']);
Route::post('/accounts_register', [AccountController::class, 'accountRegister']);
Route::get('/account', [AccountController::class, 'accountStore']);
Route::get('/accounts_delete/{id}', [AccountController::class, 'delete']);
Route::get('/accounts_show/{id}', [AccountController::class, 'show']);
Route::post('/accounts_update/{id}', [AccountController::class, 'update']);

//Transaction
Route::get('/transaction', [TransactionController::class, 'transaction']);
Route::post('/transaction_register', [TransactionController::class, 'register']);
Route::get('/transaction_delete/{id}', [TransactionController::class, 'delete']);
Route::get('/transaction_show/{id}', [TransactionController::class, 'show']);
Route::post('/transaction_update/{id}', [TransactionController::class, 'update']);

//Expense-Category
Route::controller(ExpenseCategoryController::class)->group(function () {
    Route::get('expense-category', 'expense_category')->name('expense-category');
    Route::post('category_register', 'category_store');
    Route::get('category/delete/{id}', 'category_delete');
    Route::get('category_show/{id}', 'category_show');
    Route::post('category_update/{id}', 'category_update');
});

//Company Expense
Route::controller(ExpenseController::class)->group(function () {
    Route::get('/expense', 'expense');
    Route::post('/expense_register', 'register');
    Route::get('/expense_delete/{id}', 'delete');
    Route::get('/expense_show/{id}', 'show');
    Route::post('/expense_update/{id}', 'update');
});

//User
Route::get('/user', [UserController::class, 'user']);
Route::post('/user_store', [UserController::class, 'userStore']);
Route::get('/delete/{id}', [UserController::class, 'delete']);

//Company Income
Route::get('/company_income', [CompanyIncomeController::class, 'company']);
Route::post('/companyincome_register', [CompanyIncomeController::class, 'incomeRegister']);
Route::get('/companyincome_delete/{id}', [CompanyIncomeController::class, 'delete']);
Route::get('/companyincome_show/{id}', [CompanyIncomeController::class, 'show']);
Route::post('/companyincome_show/{id}', [CompanyIncomeController::class, 'update']);


//InOut
Route::get('/inout', [InOutController::class, 'inout']);
Route::post('inout', [InOutController::class, 'inoutRegister']);
Route::get('inout_edit/{id}', [InOutController::class, 'show']);
Route::post('inout_update/{id}', [InOutController::class, 'update']);
Route::get('inout_delete/{id}', [InOutController::class, 'delete']);
