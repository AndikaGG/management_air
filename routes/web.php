<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\transaksi_galonController;
use App\Http\Controllers\userController;

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
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function (){
    Route::get('/admin/galon/filter', [transaksi_galonController::class, 'filter']);
    Route::get('/admin/galon', [transaksi_galonController::class, 'index']);
    Route::post('/admin/galon', [transaksi_galonController::class, 'store']);
    Route::put('/admin/galon/{id}', [transaksi_galonController::class, 'update']);
    Route::delete('/admin/galon/{id}', [transaksi_galonController::class, 'destroy']);

    Route::get('/admin/user', [userController::class, 'index']);
    Route::post('/admin/user', [userController::class, 'store']);
    Route::put('/admin/user/{id}', [userController::class, 'update']);
    Route::delete('/admin/user/{id}', [userController::class, 'destroy']);
    Route::get('/admin/user/filter', [userController::class, 'filter']);
});

// Route::put('/admin/galon/update/{id}','transaksi_galonController@update');
// Route::put('/admin/galon', 'transaksi_galonController@update')->name('galon.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
