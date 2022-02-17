<?php

namespace App\Http\Controllers;

use App\Models\AccountPeriod;
use App\Models\AccountPeriodDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountPeriodController extends Controller
{


    public function  index()
    {
        $account_period = AccountPeriod::all();
        return view('account_period.add', compact('account_period'));
    }

    //save account period
    public function create(Request $request)
    {

        $this->validate($request,[
            'fl_date_a' =>'required|date|after:yesterday',
            'fl_date_z'=>'required|date|after:fl_date_a',
            'fl_period_code' => 'unique:tbl_period_hdr'
        ]);
        try {

            DB::beginTransaction();
           $account_period = AccountPeriod::create($request->except(['_token']));
//            if ($account_period){
//                AccountPeriodDetail::create($request->except(['_token']));
//            }
            DB::commit();
            return redirect()->back()->with('success', 'Account Period Saved Successfully');

        } catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create_period_detail(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request,[
            'fl_dtl_date_a' =>'required|date|after:yesterday',
            'fl_dtl_date_z'=>'required|date|after:fl_dtl_date_a',
        ]);

        try {
            DB::beginTransaction();
            $period_detail = AccountPeriodDetail::create($request->except(['_token']));
            if($period_detail){
                DB::commit();
                return redirect()->back()->with('success', 'Account Period Detail Saved Successfully');
            }

        } catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('info', $exception->getMessage());
        }
    }

    public function open_close_account_period(Request $request): \Illuminate\Http\RedirectResponse
    {
        $period_code_fl = $request->input('fl_period_code');
        $open_close = $request->input('open_close');
        try {
            $check_open = AccountPeriod::all()->where('fl_closed','=',1)->count();
          // dd($check_open);

            if($open_close == 1){
                $period_header = AccountPeriod::where(['fl_period_code' => $period_code_fl]);
                $period_header->update($request->except(['_token','period_code_fl']));
                return redirect()->back()->with('success', 'Record Processed Successfully');
            } else {
                $period_header = AccountPeriod::where(['fl_period_code' => $period_code_fl]);
                $period_header->update($request->except(['_token','period_code_fl']));
                return redirect()->back()->with('success', 'Record Processed Successfully');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('info', $exception->getMessage());
        }
    }


}
