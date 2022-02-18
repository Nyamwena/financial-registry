<?php

use App\Http\Controllers\AccountPeriodController;
use App\Http\Controllers\AccountTypesController;
use App\Http\Controllers\InstituteController;
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

});

//account type
Route::prefix('account')->name('account-type.')->group(function (){
    Route::get('/account-type', [AccountTypesController::class,'index'])->name('index');
    Route::post('/account-type/store', [AccountTypesController::class,'store'])->name('store');
});




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
