<?php

namespace App\Http\Controllers;

use App\Models\AccountMainType;
use App\Models\AccountTypes;
use App\Models\ChartAccounts;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ChartAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $check_institution = Institute::all()->first();
        if (!$check_institution){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        }
        $account_type = AccountTypes::all()->where('fl_company_id','=', Session::get('company_session_id'));

        $chart_accounts= ChartAccounts::with('account_type_main',
            'account_type_a','account_type_b')->where('fl_company_id','=', Session::get('company_session_id'))
                        ->get();

       // dd($chart_accounts->fl_account_num);
        $account_main = AccountMainType::all();
        return view('chart_accounts.add', compact('account_type', 'account_main','chart_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'fl_account_num' => 'unique:tbl_chart'
        ]);
        $account = $request->input('fl_account_num');
        try {

            $validate_accounts = AccountTypes::where('fl_company_id','=', Session::get('company_session_id'))->get();
           // dd($validate_accounts);

            DB::beginTransaction();
            ChartAccounts::create($request->except(['_token']));
            DB::commit();

            return redirect()->back()->with('toast_success','Saved Successfully');

//            foreach ($validate_accounts as $range){
//                // 3000 >= db_value  && 7000 <= db_value ------->this check for rang
//                if($account >= $range->fl_account_range_a && $account <= $range->fl_account_range_z ) {
//
//                } else {
//                    return redirect()->back()->with('toast_warning','This account is not available in account types range');
//                }
//
//            }
        }catch (\Exception $exception){
            DB::rollback();

            return redirect()->back()->with('toast_error',  $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $account_type = AccountTypes::all();

            $chart_accounts= ChartAccounts::with('account_type_main',
                'account_type_a','account_type_b')
                ->get();

            // dd($chart_accounts->fl_account_num);
            $account_main = AccountMainType::all();
            $chart = ChartAccounts::where('fl_account_num', $id)->first();
            return  view('chart_accounts.edit', compact('chart','chart_accounts','account_type','account_main'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error',  $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $account_num
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $account_num)
    {
        try {
            DB::beginTransaction();
            $chart = ChartAccounts::where('fl_account_num', $account_num);
            $chart->update($request->except(['_token','_method']));
            DB::commit();
            return redirect()->to('account/chart')->with('toast_success', 'Updated Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('toast_error',  $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
