<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [App\Http\Controllers\afterRegisterController::class, 'index']);


Auth::routes();

Route::get('/afterRegister', [App\Http\Controllers\HomeController::class, 'afterRegister']);

Route::post('/inputAfterRegister', [App\Http\Controllers\afterRegisterController::class, 'inputAfterRegister']);

Route::get('/profil/{id}', [App\Http\Controllers\HomeController::class, 'showProfil'])->middleware('cek');

Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'updateProfile'])->middleware('cek');

Route::post('/profile/editpassword', [App\Http\Controllers\HomeController::class, 'editPassword'])->middleware('cek');

Route::get('/shop/produk/{id}', [App\Http\Controllers\shopController::class, 'showKelola'])->middleware('cek');

Route::get('/addproduk', [App\Http\Controllers\shopController::class, 'showTambahProduk'])->middleware('cek');

Route::post('/addproduk', [App\Http\Controllers\shopController::class, 'addProduk'])->middleware('cek');

Route::get('/productdelete/{id}', [App\Http\Controllers\shopController::class, 'deleteProduct'])->middleware('cek');

Route::get('/productedit/{id}', [App\Http\Controllers\shopController::class, 'showeditProduct'])->middleware('cek');

Route::get('/deletephoto/{id}', [App\Http\Controllers\shopController::class, 'deletePhoto'])->middleware('cek');

Route::post('/editproduk', [App\Http\Controllers\shopController::class, 'editProduct'])->middleware('cek');

Route::get('/productDetail/{id}', [App\Http\Controllers\HomeController::class, 'productDetail']);
