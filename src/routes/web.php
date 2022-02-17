<?php

use App\Http\Controllers\AccountPeriodController;
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


Route::prefix('account-period')->name('account-period.')->group(function (){
    Route::get('/', [AccountPeriodController::class,'index'])->name('index');
    Route::post('/create/account/period',[AccountPeriodController::class,'create'])->name('create');
    Route::get('/view/account/period', [AccountPeriodController::class,'show'])->name('show');
    Route::post('/create/detail', [AccountPeriodController::class,'create_period_detail'])->name('detail-create');
    Route::post('/close-open/period/{period_code}', [AccountPeriodController::class,'open_close_account_period'])->name('close-open');

});




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
