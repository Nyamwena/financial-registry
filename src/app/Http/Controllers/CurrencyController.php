<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CurrencyController extends Controller
{

    /*
     *
     *

     */

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $currencies = Currency::all();
        return view('multi_currency.add', compact('currencies'));
    }

    public function store(Request $request){
        try {
            DB::beginTransaction();
            Currency::create($request->except(['_token']));
            DB::commit();
            return redirect()->back()->withSuccess('Currency Saved Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }


    public function edit(Request $request){
        try {
            DB::beginTransaction();
          $update_currency =  Currency::where(['fl_currency_code' => $request->input('fl_currency_code')]);
          $update_currency->update($request->except(['_token']));
          DB::commit();
          return redirect()->back()->withSuccess('Record Saved Succssfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
