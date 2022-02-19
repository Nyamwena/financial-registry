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

        return view('multi_currency.add');
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
}
