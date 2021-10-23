<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\PublicOkelahController;
use App\Http\Controllers\PublicComplaintController;
use App\Http\Controllers\PublicAboutUsController;
use App\Http\Controllers\PublicStatisticController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\ReferenceSchoolController;

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

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/administrator', [AdministratorController::class, 'index'])->middleware('can:isAdmin')->name('administrator');

Route::resource('operator', 'OperatorController');
Route::get('/operator', [OperatorController::class, 'index'])->middleware('can:isOperator')->name('operator');



require __DIR__.'/auth.php';

//Public Routes
Route::resource('publicnews', 'PublicNewsController');
Route::get('public/news', [PublicNewsController::class, 'index'])->name('publicnewsindex');
Route::get('public/news/view/{idEn}', [PublicNewsController::class, 'show'])->name('publicnewsshow');

Route::resource('publicokelah', 'PublicOkelahController');
Route::get('public/okelah', [PublicOkelahController::class, 'index'])->name('publicokelahindex');
Route::get('public/okelah/checkout', [PublicOkelahController::class, 'checkout']);

Route::resource('publicaboutus', 'PublicAboutUsController');
Route::get('public/aboutus', [PublicAboutUsController::class, 'index'])->name('publicaboutusindex');

Route::resource('publiccomplaint', 'PublicComplaintController');
Route::get('public/complaint', [PublicComplaintController::class, 'index'])->name('publiccomplaintindex');

Route::resource('publicstatistic', 'PublicStatisticController');
Route::get('public/statistic', [PublicStatisticController::class, 'index'])->name('publicstatisticindex');

//Admin Routes
Route::get('/administrator/users', [AdminUserController::class, 'index'])->middleware('can:isAdmin')->name('adminuserindex');
Route::get('/administrator/users/create', [AdminUserController::class, 'create'])->middleware('can:isAdmin')->name('adminusercreate');
Route::post('/administrator/users/store', [AdminUserController::class, 'store'])->middleware('can:isAdmin')->name('adminuserstore');

Route::get('/administrator/message', [AdminMessageController::class, 'index'])->middleware('can:isAdmin')->name('adminmessageindex');

Route::get('/administrator/news', [AdminNewsController::class, 'index'])->middleware('can:isAdmin')->name('adminnewsindex');
Route::get('/administrator/news/create', [AdminNewsController::class, 'create'])->middleware('can:isAdmin')->name('adminnewscreate');
Route::post('/administrator/news/store', [AdminNewsController::class, 'store'])->middleware('can:isAdmin')->name('adminnewsstore');

Route::get('/administrator/product', [AdminProductController::class, 'index'])->middleware('can:isAdmin')->name('adminproductindex');

Route::get('/administrator/ticket', [AdminTicketController::class, 'index'])->middleware('can:isAdmin')->name('adminticketindex');

Route::get('/administrator/transaction', [AdminTransactionController::class, 'index'])->middleware('can:isAdmin')->name('admintransactionindex');

//Reference Routes
Route::get('/administrator/reference/school', [ReferenceSchoolController::class, 'index'])->middleware('can:isAdmin')->name('adminrefschool');
Route::get('/administrator/reference/school/create', [ReferenceSchoolController::class, 'create'])->middleware('can:isAdmin');

Route::post('dependent-dropdown', 'ReferenceSchoolController@storedistrict')
    ->name('dependent-dropdown.storedistrict');

/*
Route::resource('seller', 'SellerProductController');
Route::get('seller/product/{idEn}', [SellerProductController::class, 'index'])->middleware('can:isSeller')->name('sellerproduct');
Route::get('seller/product/add/{idEn}', [SellerProductController::class, 'add'])->middleware('can:isSeller')->name('sellerproductadd');
Route::get('seller/product/edit/{idEn}', [SellerProductController::class, 'edit'])->middleware('can:isSeller')->name('sellerproductedit');
Route::post('seller/product/update/{idEn}', [SellerProductController::class, 'update'])->middleware('can:isSeller')->name('sellerproductupdate');
Route::post('seller/product/store', [SellerProductController::class, 'store'])->middleware('can:isSeller')->name('sellerproductstore');
*/
