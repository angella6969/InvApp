<?php

// use auth;

use App\Models\role;
use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FormPelaporanController;
use App\Http\Controllers\RentLogController;
use Illuminate\Routing\RouteGroup;

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

Route::get('/', [loginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::get('/loginV', function () {
    return view('authentication.show');
});
Route::get('/home', function () {
    return view('home.home');
});
Route::get('/home1', function () {
    return view('home.home1');
});
Route::get('/api', function () {
    return view('api');
});
Route::post('/login', [loginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/dashboard/formlaporan', [FormPelaporanController::class, 'index'])->middleware(['auth', 'Admin']);

Route::get('/login', [loginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::get('/registrasi', [RegisController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegisController::class, 'store']);

Route::post('/rent-item/return/{id}', [RentLogController::class, 'returnItem'])->middleware(['Admin', 'auth']);


Route::middleware(['Admin', 'auth'])->group(function () {
    Route::resource('/dashboard/item', ItemController::class);
    Route::resource('/dashboard/role', RoleController::class);
    Route::resource('/dashboard', dashboardController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/rent-item', RentLogController::class);
});
