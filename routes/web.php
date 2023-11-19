<?php

use App\Models\Car;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TubeController;
use App\Http\Controllers\UserController;
use App\Models\Tube;

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



Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'adminLogin'])->name('admin. login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout']);



Route::middleware(['auth'])->group(
    function () {
        Route::get('/dashboard', function () {
            $tubes = Tube::latest()->get();

            return view('dashboard', compact('tubes'));
        })->name('dashboard');

        //Users
        Route::get('user', [UserController::class, 'user_register']);
        Route::post('User_Register', [UserController::class, 'user_store']);
        Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
        Route::get('/delete_user/{id}', [UserController::class, 'delete_user']);
        Route::get('/userShow/{id}', [UserController::class, 'userShow']);

        Route::post('/update_user/{id}', [UserController::class, 'update_user']);

        //Tube
        Route::get('dashboard/tube', [TubeController::class, 'tubes']);
        Route::post('dashboard/tube/store', [TubeController::class, 'tubeStore']);
        Route::get('delete_detail/{id}', [TubeController::class, 'delete_detail']);
        Route::get('edit/{id}', [TubeController::class, 'edit']);

        Route::post('update_tube/{id}', [TubeController::class, 'update']);


        //Customer
        Route::get('customers', [CustomerController::class, 'customer']);
        Route::post('/customer_register', [CustomerController::class, 'register']);
        Route::get('delete/{id}', [CustomerController::class, 'delete']);
        Route::post('update_customer/{id}', [CustomerController::class, 'update']);

        Route::get('/customer/filter', [CustomerController::class, 'filter'])->name('filter.customer');
        Route::get('daily_customer', [CustomerController::class, 'dailyShow']);
    }
);
