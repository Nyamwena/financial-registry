<?php

namespace App\Http\Controllers;

use App\Models\AccountMainType;
use App\Models\AccountTypes;
use App\Models\ChartAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $account_type = AccountTypes::all();

        $account_main = AccountMainType::all();
        return view('chart_accounts.add', compact('account_type', 'account_main'));
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
        try {


            DB::beginTransaction();
            ChartAccounts::create($request->except(['_token']));
            DB::commit();
            return redirect()->back()->with('toast_success','Saved Successfully');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
