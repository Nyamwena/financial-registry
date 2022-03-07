<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExchangeRateController extends Controller
{

    public function index(){
        $exchange_rate = ExchangeRate::with('currency_dest','currency_base')->get();
           // dd($exchange_rate);


        $currencies = Currency::all()->where('fl_active','=',1);
     //  dd($exchange_rate->fl_currency_code_dest);
        return view('multi_currency.exchange_rate',
                        compact('exchange_rate','currencies'));
    }

    public function exchange_add(Request $request){
        try {
            DB::beginTransaction();
            ExchangeRate::create($request->except(['_token']));
            DB::commit();
            return redirect()->back()->withSuccess('Exchange Rate Added Successfully');

        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
