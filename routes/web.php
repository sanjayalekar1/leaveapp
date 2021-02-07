<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeLeaveHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function () {

    // Route::get('/home', function () {
    //     if (Auth::user()->role_id==2) {         // 2: Developer Role
    //         return view('devhome');
    //     } else if(Auth::user()->role_id==1){    //1: HR Role
    //         return view('hrhome');
    //     }else{
    //         abort(404);
    //     }
    // });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/update-leave', [EmployeeLeaveHistoryController::class, 'update'])->name('update-leave');
    Route::get('/cancel-leave', [EmployeeLeaveHistoryController::class, 'destroy'])->name('cancel-leave');
    Route::get('/filter-result', [EmployeeLeaveHistoryController::class, 'searchByEmployee'])->name('filter-result');

});


