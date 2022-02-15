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
   // Route::get('/registrationForm/{studentNumber}', [App\Http\Controllers\::class,'registrationForm'])->name('reg');
});




