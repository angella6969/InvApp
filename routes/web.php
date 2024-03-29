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
use Illuminate\Support\Facades\Artisan;

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
    return redirect()->route('login');
});

Route::get('/access_denied', function () {
    return view('access_denied');
});

// Route::get('/loginV', function () {
//     return view('authentication.show');
// });

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
    Route::get('/dashboard/item/detail/{name}/{category}', [ItemController::class, 'detail']);
    Route::delete('/dashboard/item/{name}/{category}', [ItemController::class, 'massDestroy']);
    Route::get('/dashboard/item/update/{name}/{category}', [ItemController::class, 'massUpdate']);





    Route::resource('/dashboard/item', ItemController::class);
    Route::resource('/dashboard/role', RoleController::class);
    Route::resource('/dashboard', dashboardController::class);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/rent-item', RentLogController::class);
});

Route::get('/tes', function () {
    Artisan::call('storage:link');
});
// Route::POST('/item/import', [ItemController::class, 'import']);
Route::post('/item/import', [ItemController::class, 'import']);


///////// route test ////////

