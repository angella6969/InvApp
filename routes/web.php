<?php

// use auth;

use App\Http\Controllers\CategoriesController;
use App\Models\category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboardController;

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
    return view('dashboard.categories.index',[
        "categories" => category::latest()
           ->paginate(20)
           ->withQueryString()
   ]);
});
Route::get('/api', function () {
    return view('api');
});
Route::post('/login',[loginController::class, 'authenticate' ]);
Route::get('/login',[loginController::class, 'index' ])
            ->name('login')
            ->middleware('guest');

Route::post('/logout',[LoginController::class, 'logout' ]);

Route::get('/registrasi',[RegisController::class, 'index' ])->middleware('guest');
Route::post('/registrasi',[RegisController::class, 'store' ]);

Route::resource('/dashboard/item', ItemController::class)->middleware('auth');
Route::resource('/dashboard', dashboardController::class)->middleware('auth');
Route::resource('/dashboard/categories', CategoriesController::class)->middleware('auth');


