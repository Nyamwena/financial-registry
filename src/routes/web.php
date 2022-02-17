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
//Auth::routes();
//->middleware(['auth'])
Route::prefix('institute')->name('institute.')->group(function (){
    Route::get('/', [App\Http\Controllers\InstituteController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\InstituteController::class,'store'])->name('store');

   // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});

Route::prefix('payment_method')->name('payment_method.')->group(function (){
    Route::get('/', [App\Http\Controllers\PaymentMethodController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\PaymentMethodController::class,'store'])->name('store');

    // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});

Route::prefix('currency')->name('currency.')->group(function (){
    Route::get('/', [App\Http\Controllers\MultiCurrencyController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\MultiCurrencyController::class,'store'])->name('store');

    // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});

Route::prefix('chart_accounts')->name('chart_accounts.')->group(function (){
    Route::get('/', [App\Http\Controllers\ChartAccountsController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\ChartAccountsController::class,'store'])->name('store');

    // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});

Route::prefix('account_types')->name('account_types.')->group(function (){
    Route::get('/', [App\Http\Controllers\AccountTypesController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\AccountTypesController::class,'store'])->name('store');

    // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});

Route::prefix('responsibility_centre')->name('responsibility_centre.')->group(function (){
    Route::get('/', [App\Http\Controllers\ResponsibilityCentreController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\ResponsibilityCentreController::class,'store'])->name('store');

    // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});

Route::prefix('accounting_periods')->name('accounting_periods.')->group(function (){
    Route::get('/', [App\Http\Controllers\AccountPeriodController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\AccountPeriodController::class,'store'])->name('store');

    // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});

Route::prefix('acc_period_detail')->name('acc_period_detail.')->group(function (){
    Route::get('/', [App\Http\Controllers\AccPeriodDetailController::class,'index'])->name('index');
    Route::post('/post',[App\Http\Controllers\AccPeriodDetailController::class,'store'])->name('store');

    // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});
