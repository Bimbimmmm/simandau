<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicNewsController;

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
    return view('public/home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('publicnews', 'PublicNewsController');
Route::get('public/news', [PublicNewsController::class, 'index'])->name('publicnewsindex');

/*
Route::resource('seller', 'SellerProductController');
Route::get('seller/product/{idEn}', [SellerProductController::class, 'index'])->middleware('can:isSeller')->name('sellerproduct');
Route::get('seller/product/add/{idEn}', [SellerProductController::class, 'add'])->middleware('can:isSeller')->name('sellerproductadd');
Route::get('seller/product/edit/{idEn}', [SellerProductController::class, 'edit'])->middleware('can:isSeller')->name('sellerproductedit');
Route::post('seller/product/update/{idEn}', [SellerProductController::class, 'update'])->middleware('can:isSeller')->name('sellerproductupdate');
Route::post('seller/product/store', [SellerProductController::class, 'store'])->middleware('can:isSeller')->name('sellerproductstore');
*/
