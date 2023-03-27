<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RegisController;

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

Route::resource('/dashboard/item', ItemController::class);
Route::resource('/dashboard', dashboardController::class)->middleware('Auth');


