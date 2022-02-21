<?php

use App\Http\Controllers\AccountPeriodController;
use App\Http\Controllers\AccountTypesController;
use App\Http\Controllers\ChartAccountsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\FeesGroupController;
use App\Http\Controllers\FeesStructureController;
use App\Http\Controllers\InstituteController;
use App\Http\Controllers\OrdinanceController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PointOfSaleController;
use App\Http\Controllers\ResponsibilityCentreController;
use App\Http\Controllers\ServiceProductController;
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
//Auth::routes();
//->middleware(['auth'])
Route::prefix('institute')->name('institute.')->group(function (){
    Route::get('/', [InstituteController::class,'index'])->name('index');

});


Route::prefix('account')->name('account-period.')->group(function (){
    Route::get('/account-period', [AccountPeriodController::class,'index'])->name('index');
    Route::post('/account-period/create/account/period',[AccountPeriodController::class,'create'])->name('create');
    Route::get('/account-period/view/account/period', [AccountPeriodController::class,'show'])->name('show');
    Route::post('/account-period/create/detail', [AccountPeriodController::class,'create_period_detail'])->name('detail-create');
    Route::post('/account-period/close-open/period/', [AccountPeriodController::class,'open_close_account_period'])->name('close-open');

    //centres



});

//account type
Route::prefix('account')->name('account-type.')->group(function (){
    Route::get('/account-type', [AccountTypesController::class,'index'])->name('index');
    Route::post('/account-type/store', [AccountTypesController::class,'store'])->name('store');
});


//chart of accounts
Route::prefix('account')->name('chart.')->group(function (){
    Route::get('/chart', [ChartAccountsController::class,'index'])->name('index');
    Route::post('/chart/store', [ChartAccountsController::class,'store'])->name('store');

    Route::get('/responsibility/centre', [ResponsibilityCentreController::class,'index'])->name('payment-method-index');
    Route::post('/responsibility/centre/store', [ResponsibilityCentreController::class,'create_centre'])->name('responsibility-centre-store');
});


Route::prefix('account')->name('center.')->group(function (){
    Route::get('/responsibility/centre', [ResponsibilityCentreController::class,'index'])->name('index');
    Route::post('/responsibility/centre/store', [ResponsibilityCentreController::class,'create_centre'])->name('responsibility-centre-store');



     Route::post('/service-product/store', [ServiceProductController::class,'create_service_product'])->name('service-product');
    Route::post('/service-product/assign/center', [ServiceProductController::class,'assign_service'])->name('assign-service');

});


// currency exchange_rate payment_methods
Route::prefix('monetary')->name('monetary.')->group(function (){
    Route::get('/currency', [CurrencyController::class,'index'])->name('currency-index');
    Route::post('/currency/store', [CurrencyController::class,'store'])->name('currency-store');

    Route::post('/currency/edit', [CurrencyController::class,'edit'])->name('currency-edit');

    //exchange rate
    Route::get('/exchange/rate/', [ExchangeRateController::class,'index'])->name('exchange-index');
    Route::post('/exchange/rate/post', [ExchangeRateController::class,'exchange_add'])->name('exchange-add');

    //payment methods

    Route::get('/payment_method', [PaymentMethodController::class,'index'])->name('payment-method-index');
    Route::post('/payment_method/create', [PaymentMethodController::class,'create_payment_method'])->name('payment-method-post');

    //responsibility centers
});


//fees grp
Route::prefix('fees')->name('fees.')->group(function (){
    Route::get('/', [FeesGroupController::class,'index'])->name('index');
    Route::post('/fees/store', [FeesGroupController::class,'create_fees_group'])->name('create');

    //ordinance

    Route::get('/ordinance/view', [OrdinanceController::class,'index'])->name('ordinance-index');
    Route::post('/ordinance/store', [OrdinanceController::class,'create_fees_ordinance'])->name('ordinance-create');


    //fees structure
    Route::get('/structure/view', [FeesStructureController::class,'index'])->name('structure-index');
    Route::post('/structure/store', [FeesStructureController::class,'create_fees_structure'])->name('structure-create');


});


//fees collection

Route::prefix('point-of-sale')->name('pos.')->group(function (){
    Route::get('/', [PointOfSaleController::class,'index'])->name('index');
    Route::post('/fees/store', [PointOfSaleController::class,'create_fees_group'])->name('create');
});




Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
