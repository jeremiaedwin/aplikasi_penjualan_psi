<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PenjualanController;
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

Route::get('/penjualan/create', [PenjualanController::class, 'create']);
Route::post('/penjualan/', [PenjualanController::class, 'store']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/delete/{id}', [ProductController::class, 'destroy']);
Route::get('/product/detail/{id}', [ProductController::class, 'detailProduct']);
Route::get('/product/update/stok', [ProductController::class, 'updateStok']);
Route::put('/product/update', [ProductController::class, 'addStok']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
