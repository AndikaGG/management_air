<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\transaksi_galonController;
use App\Http\Controllers\transaksi_jerigenController;
use App\Http\Controllers\transaksi_tankiController;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda dapat mendaftarkan rute web untuk aplikasi Anda. Ini
| rute dimuat oleh RouteServiceProvider dalam grup yang
| berisi grup middleware "web". Sekarang ciptakan sesuatu yang hebat!

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

    Route::get('/admin/jerigen/filter', [transaksi_jerigenController::class, 'filter']);
    Route::get('/admin/jerigen', [transaksi_jerigenController::class, 'index']);
    Route::post('/admin/jerigen', [transaksi_jerigenController::class, 'store']);
    Route::put('/admin/jerigen/{id}', [transaksi_jerigenController::class, 'update']);
    Route::delete('/admin/jerigen/{id}', [transaksi_jerigenController::class, 'destroy']);

    Route::get('/admin/tanki', [transaksi_tankiController::class, 'index']);
    Route::post('/admin/tanki', [transaksi_tankiController::class, 'store']);
    Route::put('/admin/tanki/{id}', [transaksi_tankiController::class, 'update']);
    Route::delete('/admin/tanki/{id}', [transaksi_tankiController::class, 'destroy']);
    Route::get('/admin/tanki/filter', [transaksi_tankiController::class, 'filter']);

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
