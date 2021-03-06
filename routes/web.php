<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\AdminTransactionController;
use App\Http\Controllers\AdminMailController;
use App\Http\Controllers\ReferenceSchoolController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\OperatorProductController;
use App\Http\Controllers\OperatorBankAccountController;
use App\Http\Controllers\OperatorPaymentController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PublicNewsController;
use App\Http\Controllers\PublicOkelahController;
use App\Http\Controllers\PublicComplaintController;
use App\Http\Controllers\PublicAboutUsController;
use App\Http\Controllers\PublicStatisticController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\PublicPaymentController;
use App\Http\Controllers\PublicIncomingMailController;
use App\Http\Controllers\PublicTicketingController;

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

Route::get('/operator', [OperatorController::class, 'index'])->middleware('can:isOperator')->name('operator');



require __DIR__.'/auth.php';

Route::get('getCity/{id}', function ($id) {
    $cities = App\Models\Cities::where('province_code',$id)->get();
    return response()->json($cities);
});

Route::get('getDistrict/{id}', function ($id) {
    $districts = App\Models\Districts::where('city_code',$id)->get();
    return response()->json($districts);
});

Route::get('getVillage/{id}', function ($id) {
    $villages = App\Models\Villages::where('district_code',$id)->get();
    return response()->json($villages);
});
//Public Routes
Route::resource('publicnews', 'PublicNewsController');
Route::get('public/news', [PublicNewsController::class, 'index'])->name('publicnewsindex');
Route::get('public/news/view/{title}', [PublicNewsController::class, 'show'])->name('publicnewsshow');
Route::post('/public/news/store', [PublicNewsController::class, 'store'])->middleware('can:isGuest')->name('usernewscomment');

Route::resource('publicokelah', 'PublicOkelahController');
Route::get('public/okelah', [PublicOkelahController::class, 'index'])->name('publicokelahindex');
Route::get('public/okelah/view/{idEn}', [PublicOkelahController::class, 'show'])->name('publicokelahshow');
Route::get('public/okelah/category/{id}', [PublicOkelahController::class, 'category']);
Route::post('public/okelah/addcart/{idEn}', [PublicOkelahController::class, 'addcart'])->middleware('can:isGuest')->name('useraddtocart');
Route::get('public/okelah/checkout', [PublicOkelahController::class, 'checkout'])->middleware('can:isGuest')->name('usercheckout');
Route::post('public/okelah/pay', [PublicOkelahController::class, 'store'])->middleware('can:isGuest')->name('userpay');
Route::delete('public/okelah/destroy/{id}', [PublicOkelahController::class, 'destroy'])->name('userokelah.destroy');
Route::get('public/okelah/cart', [PublicOkelahController::class, 'cart'])->middleware('can:isGuest')->name('usercart');

Route::get('public/okelah/payment', [PublicPaymentController::class, 'index'])->middleware('can:isGuest')->name('userpaymentindex');
Route::get('public/okelah/payment/{idEn}', [PublicPaymentController::class, 'show'])->middleware('can:isGuest')->name('userpaymentview');
Route::post('public/okelah/payment/proof/{idEn}', [PublicPaymentController::class, 'update'])->middleware('can:isGuest')->name('paymentproof');

Route::get('public/profile', [PublicProfileController::class, 'index'])->name('publicprofileindex');
Route::get('public/profile/add', [PublicProfileController::class, 'create'])->name('publicprofileadd');

Route::resource('publicaboutus', 'PublicAboutUsController');
Route::get('public/aboutus', [PublicAboutUsController::class, 'index'])->name('publicaboutusindex');

Route::resource('publiccomplaint', 'PublicComplaintController');
Route::get('public/complaint', [PublicComplaintController::class, 'index'])->name('publiccomplaintindex');

Route::resource('publicstatistic', 'PublicStatisticController');
Route::get('public/statistic', [PublicStatisticController::class, 'index'])->name('publicstatisticindex');
Route::post('public/statistic/search', [PublicStatisticController::class, 'search'])->name('publicstatisticsearch');

Route::get('public/mail', [PublicIncomingMailController::class, 'index'])->name('publicmail');
Route::get('public/mail/add', [PublicIncomingMailController::class, 'create'])->name('publicmailadd');
Route::post('/public/mail/store', [PublicIncomingMailController::class, 'store'])->name('publicmailstore');

Route::get('public/complaint/ticketing', [PublicTicketingController::class, 'index'])->name('publicticketing');
Route::get('public/complaint/ticketing/create', [PublicTicketingController::class, 'create'])->middleware('can:isGuest')->name('publicticketingcreate');
Route::get('public/complaint/ticketing/show/{idEn}', [PublicTicketingController::class, 'show'])->middleware('can:isGuest')->name('publicticketingshow');
Route::post('/public/complaint/ticketing/store', [PublicTicketingController::class, 'store'])->middleware('can:isGuest')->name('publicticketingstore');
Route::post('/public/complaint/ticketing/reply/{idEn}', [PublicTicketingController::class, 'reply'])->middleware('can:isGuest')->name('publicticketingreply');

//Admin Routes
Route::get('/administrator/users', [AdminUserController::class, 'index'])->middleware('can:isAdmin')->name('adminuserindex');
Route::get('/administrator/users/create', [AdminUserController::class, 'create'])->middleware('can:isAdmin')->name('adminusercreate');
Route::post('/administrator/users/store', [AdminUserController::class, 'store'])->middleware('can:isAdmin')->name('adminuserstore');

Route::get('/administrator/message', [AdminMessageController::class, 'index'])->middleware('can:isAdmin')->name('adminmessageindex');

Route::get('/administrator/news', [AdminNewsController::class, 'index'])->middleware('can:isAdmin')->name('adminnewsindex');
Route::get('/administrator/news/create', [AdminNewsController::class, 'create'])->middleware('can:isAdmin')->name('adminnewscreate');
Route::post('/administrator/news/store', [AdminNewsController::class, 'store'])->middleware('can:isAdmin')->name('adminnewsstore');
Route::get('/administrator/news/show/{id}', [AdminNewsController::class, 'show'])->middleware('can:isAdmin');
Route::get('/administrator/news/edit/{id}', [AdminNewsController::class, 'edit'])->middleware('can:isAdmin');
Route::get('/administrator/news/destroy/{id}', [AdminNewsController::class, 'destroy'])->middleware('can:isAdmin');
Route::get('/administrator/news/destroycomment/{id}', [AdminNewsController::class, 'destroycomment'])->middleware('can:isAdmin');

Route::get('/administrator/product', [AdminProductController::class, 'index'])->middleware('can:isAdmin')->name('adminproductindex');

Route::get('/administrator/ticket', [AdminTicketController::class, 'index'])->middleware('can:isAdmin')->name('adminticketindex');
Route::get('/administrator/ticket/show/{idEn}', [AdminTicketController::class, 'show'])->middleware('can:isAdmin')->name('adminticketshow');
Route::post('/administrator/ticket/show/reply/{idEn}', [AdminTicketController::class, 'reply'])->middleware('can:isAdmin')->name('publicticketingreply');
Route::get('/administrator/ticket/finish/{idEn}', [AdminTicketController::class, 'finish'])->middleware('can:isAdmin')->name('publicticketingfinish');
Route::get('/administrator/ticket/destroy/{idEn}', [AdminTicketController::class, 'destroy'])->middleware('can:isAdmin')->name('publicticketingdestroy');

Route::get('/administrator/mail', [AdminMailController::class, 'index'])->middleware('can:isAdmin')->name('adminmailindex');
Route::get('/administrator/mail/destroy/{id}', [AdminMailController::class, 'destroy'])->middleware('can:isAdmin')->name('adminmailidestroy');

Route::get('/administrator/transaction', [AdminTransactionController::class, 'index'])->middleware('can:isAdmin')->name('admintransactionindex');
Route::get('/administrator/transaction/show/{idEn}', [AdminTransactionController::class, 'show'])->middleware('can:isAdmin')->name('admintransactionshow');
Route::post('/administrator/transaction/accept/{idEn}', [AdminTransactionController::class, 'update'])->middleware('can:isAdmin')->name('admintransactionaccept');
Route::post('/administrator/transaction/reject/{idEn}', [AdminTransactionController::class, 'reject'])->middleware('can:isAdmin')->name('admintransactionreject');


//Reference Routes
Route::get('/administrator/reference/school', [ReferenceSchoolController::class, 'index'])->middleware('can:isAdmin')->name('adminrefschool');
Route::get('/administrator/reference/school/create', [ReferenceSchoolController::class, 'create'])->middleware('can:isAdmin');
Route::post('/administrator/reference/school/store', [ReferenceSchoolController::class, 'store'])->middleware('can:isAdmin')->name('adminrefschoolstore');
Route::get('/administrator/reference/school/destroy/{id}', [ReferenceSchoolController::class, 'destroy'])->middleware('can:isAdmin')->name('adminrefschooldestroy');

//Operator Routes
Route::get('/operator/product', [OperatorProductController::class, 'index'])->middleware('can:isOperator')->name('operatorproductindex');
Route::get('/operator/product/create', [OperatorProductController::class, 'create'])->middleware('can:isOperator')->name('operatorproductadd');
Route::post('/operator/product/store', [OperatorProductController::class, 'store'])->middleware('can:isOperator')->name('operatorproductstore');

Route::get('/operator/bank', [OperatorBankAccountController::class, 'index'])->middleware('can:isOperator')->name('operatorbankindex');
Route::get('/operator/bank/create', [OperatorBankAccountController::class, 'create'])->middleware('can:isOperator')->name('operatorbankadd');
Route::post('/operator/bank/store', [OperatorBankAccountController::class, 'store'])->middleware('can:isOperator')->name('operatorbankstore');
Route::get('/operator/bank/store/{id}', [OperatorBankAccountController::class, 'destroy'])->middleware('can:isOperator');

Route::get('/operator/payment', [OperatorPaymentController::class, 'index'])->middleware('can:isOperator')->name('operatorpayment');
Route::get('/operator/payment/view/{idEn}', [OperatorPaymentController::class, 'show'])->middleware('can:isOperator')->name('operatorpaymentshow');
Route::post('/operator/payment/accept/{idEn}', [OperatorPaymentController::class, 'update'])->middleware('can:isOperator')->name('operatorpaymentupdate');
Route::post('/operator/payment/reject/{idEn}', [OperatorPaymentController::class, 'reject'])->middleware('can:isOperator')->name('operatorpaymentreject');

/*
Route::resource('seller', 'SellerProductController');
Route::get('seller/product/{idEn}', [SellerProductController::class, 'index'])->middleware('can:isSeller')->name('sellerproduct');
Route::get('seller/product/add/{idEn}', [SellerProductController::class, 'add'])->middleware('can:isSeller')->name('sellerproductadd');
Route::get('seller/product/edit/{idEn}', [SellerProductController::class, 'edit'])->middleware('can:isSeller')->name('sellerproductedit');
Route::post('seller/product/update/{idEn}', [SellerProductController::class, 'update'])->middleware('can:isSeller')->name('sellerproductupdate');
Route::post('seller/product/store', [SellerProductController::class, 'store'])->middleware('can:isSeller')->name('sellerproductstore');
*/
