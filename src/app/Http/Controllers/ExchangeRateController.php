<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\ExchangeRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExchangeRateController extends Controller
{

    public function index(){
        $exchange_rate = ExchangeRate::with('currency')->get();

//        select('*')
//                            ->join('tbl_currency','tbl_currency.fl_currency_code','=','tbl_exchange.fl_currency_code')
//                            //->join('tbl_currency','tbl_currency.fl_currency_code','=','tbl_exchange.fl_currency_code_dest')
//                            ->get();


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
