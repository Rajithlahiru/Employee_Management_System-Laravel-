<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', function () {
    return view('welcome');
});

//dashboard
Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'submit_login']);
Route::get('admin/logout',[AdminController::class,'logout']);

//Employee Resource

Route::resource('employee',EmployeeController::class);