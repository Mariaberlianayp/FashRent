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


Route::get('/', [App\Http\Controllers\afterRegisterController::class, 'index'])->middleware('cek');

Auth::routes();

Route::get('/afterRegister', [App\Http\Controllers\HomeController::class, 'afterRegister']);

Route::post('/inputAfterRegister', [App\Http\Controllers\afterRegisterController::class, 'inputAfterRegister']);


Route::get('/profileDetail/{id}', [App\Http\Controllers\HomeController::class, 'profileDetail'])->middleware('cek');
Route::get('/profil/{id}', [App\Http\Controllers\HomeController::class, 'editProfile'])->middleware('cek');

Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'updateProfile'])->middleware('cek');

Route::post('/profile/editpassword', [App\Http\Controllers\HomeController::class, 'editPassword'])->middleware('cek');

Route::get('/shop/produk', [App\Http\Controllers\shopController::class, 'showKelola'])->middleware('cek');

Route::get('/addproduk', [App\Http\Controllers\shopController::class, 'showTambahProduk'])->middleware('cek');

Route::post('/addproduk', [App\Http\Controllers\shopController::class, 'addProduk'])->middleware('cek');

Route::get('/productdelete/{id}', [App\Http\Controllers\shopController::class, 'deleteProduct'])->middleware('cek');

Route::get('/productedit/{id}', [App\Http\Controllers\shopController::class, 'showeditProduct'])->middleware('cek');

Route::get('/deletephoto/{id}', [App\Http\Controllers\shopController::class, 'deletePhoto'])->middleware('cek');

Route::post('/editproduk', [App\Http\Controllers\shopController::class, 'editProduct'])->middleware('cek');

Route::get('/productDetail/{id}', [App\Http\Controllers\shopController::class, 'productDetail']);

Route::get('/category/{id}', [App\Http\Controllers\searchController::class, 'categorySearch']);

Route::get('/detailtoko/{id}', [App\Http\Controllers\shopController::class, 'showDetailToko']);

Route::get('/product/360photo/{id}',[App\Http\Controllers\shopController::class,'view360photo']);

Route::get('/allshop',[App\Http\Controllers\shopController::class,'viewAllShop']);

Route::post('/add360photo', [App\Http\Controllers\shopController::class, 'add360photo'])->middleware('cek');

Route::get('/verif/acc/{id}',[App\Http\Controllers\adminController::class,'accept']);

Route::get('/verif/dec/{id}',[App\Http\Controllers\adminController::class,'decline']);

Route::get('/feedback/{id}',[App\Http\Controllers\shopController::class,'viewfeedback']);

Route::post('/addfeedback', [App\Http\Controllers\shopController::class, 'addfeedback']);

Route::get('/search',[App\Http\Controllers\searchController::class,'productSearch']);
