<?php

use App\Models\Car;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CarExpensesController;
use App\Http\Controllers\MonthlyPaymentController;
use App\Http\Controllers\CompanyExpensesController;
use App\Http\Controllers\DriverAttendanceController;


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
// Route::get('/admin/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);


// Route::middleware(['auth.dashboard'])->group(function () {

//     Route::get('/dashboard', [AuthController::class, 'dashboard']);

// });

Route::get('/dashboard', function () {
    $show = Car::latest()->get();
    return view('dashboard', compact('show'));
})->middleware(['auth', 'verified'])->name('dashboard');




//Car Register
Route::get('/Car_Register', [CarController::class, 'cars']);
Route::post('/Car_Register', [CarController::class, 'car_store']);
Route::get('/edit_car/{id}', [CarController::class, 'edit_car']);
Route::post('/update_car/{id}', [CarController::class, 'update_car']);
Route::get('/carDetail/{id}', [CarController::class, 'carDetail']);
Route::get('/delete_car/{id}', [CarController::class, 'delete_car']);



//Click the button driver id and car id are connect and remove driver
Route::get('/addDriver/{id}', [CarController::class, 'addDriver'])->name('add.driver');
Route::post('/associate-driver/{id}', [CarController::class, 'associateDriver'])->name('associate-driver');
Route::get('/associate-driver-delete/{id}', [CarController::class, 'disassociateDriver'])->name('disassociate-driver');




Route::get('/addCarBranch/{id}', [BranchController::class, 'addCarBranch'])->name('addCarBranch');
Route::post('/associateCarBranch/{id}', [BranchController::class, 'associateCarBranch'])->name('associateCarBranch');
Route::get('/associate-carBranch-delete/{id}', [BranchController::class, 'carBranchDelete'])->name('disassociate-car');


Route::post('/associatepayment/{id}', [BranchController::class, 'associatepayment'])->name('associatepayment');




//Click the button driver id and car id are connect and remove driver

//Driver
Route::get('/Driver', [DriverController::class, 'drivers']);
Route::post('/Drivers', [DriverController::class, 'drivers_store']);
Route::get('/delete_driver/{id}', [DriverController::class, 'delete_driver']);
Route::get('/edit_driver/{id}', [DriverController::class, 'edit_driver']);
Route::post('/update_driver/{id}', [DriverController::class, 'update_driver']);
Route::get('/delete_car/{id}', [CarController::class, 'delete_car']);

//Drivers_Attendance

Route::get('/driver-attendance/{id}', [DriverAttendanceController::class, 'driver_attendance'])->name('driver-attendance');;
Route::post('/driver-attendance-start/{id}', [DriverAttendanceController::class, 'DriverAttendanceStore'])->name('driver-attendance-start');

Route::post('/driver-attendance-end/{id}', [DriverAttendanceController::class, 'DriverAttendanceEnd'])->name('driver-attendance-end');
Route::get('/driver_attendanceDelete/{id}', [DriverAttendanceController::class, 'delete']);
Route::get('/driver_attendanceShow/{id}', [DriverAttendanceController::class, 'show']);
Route::post('/driver_attendanceUpdate/{id}', [DriverAttendanceController::class, 'update']);

//Drivers_Attendance_Search

Route::get('/driver-attendance/filter/{id}', [DriverAttendanceController::class, 'filter'])->name('filter.driver.attendance');


// Expense
Route::get('/Expenses', [ExpenseController::class, 'expenses']);
Route::post('/expenses', [ExpenseController::class, 'expenses_store']);

Route::get('/delete_expense/{id}', [ExpenseController::class, 'delete_expense']);
Route::get('/edit_expense/{id}', [ExpenseController::class, 'edit_expense']);
Route::post('/update_expense/{id}', [ExpenseController::class, 'update_expense']);

//Company Register
Route::get('/company_list', [CompanyController::class, 'company']);
Route::get('/company_register', [CompanyController::class, 'companyRegister'])->name('companyRegister');
Route::post('/company_register', [CompanyController::class, 'companydata_store']);
Route::get('/company_delete/{id}', [CompanyController::class, 'delete']);
Route::get('/company_edit/{id}', [CompanyController::class, 'edit']);
Route::post('/company_update/{id}', [CompanyController::class, 'update']);

Route::get('/company/{id}/branches', [CompanyController::class, 'showBranches'])->name('company.branches');


//Branch Register
Route::get('/branch_list', [BranchController::class, 'branch'])->name('branchList');
Route::get('/branch_register', [BranchController::class, 'branchRegister'])->name('branchRegister');
Route::post('/branch_register', [BranchController::class, 'branchStore']);
Route::get('/branch_delete/{id}', [BranchController::class, 'delete']);
Route::get('/branch_edit/{id}', [BranchController::class, 'edit']);
Route::post('/branch_update/{id}', [BranchController::class, 'update']);


//User Excel
Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [UserController::class, 'fileImport'])->name('file-import');
Route::get('file-export', [UserController::class, 'fileExport'])->name('file-export');


//Drivers Excel
Route::get('file-import-export', [DriverController::class, 'fileImportExport']);
Route::post('file-import-drivers', [DriverController::class, 'fileImport'])->name('file-import-drivers');
Route::get('file-export-drivers', [DriverController::class, 'fileExport'])->name('file-export-drivers');



//Company Excel
Route::get('file-import-export', [CompanyController::class, 'fileImportExport']);
Route::post('file-import-company', [CompanyController::class, 'fileImport'])->name('file-import-company');
Route::get('file-export-company', [CompanyController::class, 'fileExport'])->name('file-export-company');


//Cars Excel
Route::get('file-import-export', [CarController::class, 'fileImportExport']);
Route::post('file-import-car', [CarController::class, 'fileImport'])->name('file-import-car');
Route::get('file-export-car', [CarController::class, 'fileExport'])->name('file-export-car');



// Payment
Route::get('payment', [PaymentController::class, 'payment']);
Route::get('car/{id}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::put('car/{id}', [CarController::class, 'update'])->name('car.update');


Route::delete('/car/{car}', [CarController::class, 'destroy'])->name('car.destroy');


//Company Expense

Route::get('/company_expenses', [CompanyExpensesController::class, 'index'])->name('companyExpenseList');
Route::get('/create_expenses', [CompanyExpensesController::class, 'create']);
Route::post('/store_expenses', [CompanyExpensesController::class, 'store']);
Route::get('edit_expenses/{id}', [CompanyExpensesController::class, 'edit']);
Route::post('/update_expenses/{id}', [CompanyExpensesController::class, 'update']);
Route::get('/show_expenses/{id}', [CompanyExpensesController::class, 'show']);
Route::get('/destroy/{id}', [CompanyExpensesController::class, 'destroy']);




//Car Expense
Route::get('car_expenses', [CarExpensesController::class, 'car_expenses'])->name('carExpenseList');
Route::get('/carExpenseShow', [CarExpensesController::class, 'carExpenseShow']);
Route::post('/carExpenseStore', [CarExpensesController::class, 'carExpenseStore'])->name('carExpenseStore');
Route::get('/carExpense_delete/{id}', [CarExpensesController::class, 'delete']);
Route::get('/carExpense_edit/{id}', [CarExpensesController::class, 'edit']);
Route::post('/carExpense_update/{id}', [CarExpensesController::class, 'update']);


// Monthly_payment
Route::get('monthly_payment', [MonthlyPaymentController::class, 'monthly_payment']);
Route::get('monthly_payment/register', [MonthlyPaymentController::class, 'monthly_payment_register']);
Route::post('monthly_payment/store', [MonthlyPaymentController::class, 'monthly_payment_store']);

Route::get('paymentDelete/{id}', [MonthlyPaymentController::class, 'paymentDelete']);
Route::get('monthly_payment_show/{id}', [MonthlyPaymentController::class, 'monthly_payment_show']);

Route::post('monthly_update/{id}', [MonthlyPaymentController::class, 'monthly_payment_update']);


Route::get('show_image', [MonthlyPaymentController::class, 'showimage']);
