<?php

namespace App\Http\Controllers;

use App\Models\AccountTypes;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AccountTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $check_institution = Institute::all()->first();
        $account_types = AccountTypes::all()->where('fl_company_id','=', Session::get('company_session_id'));

        if (!$check_institution){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        }
        return view('account_types.add', compact('account_types'));
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
        $validator = Validator::make($request->all(), [
            'fl_account_type_name' => 'required|min:3',
            'fl_account_range_a' => 'required_with:fl_account_range_z',
            'fl_account_range_z' => 'required_with:fl_account_range_a|integer|gt:fl_account_range_a'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $range_a = $request->input('fl_account_range_a');
        $range_z = $request->input('fl_account_range_z');

      //  dd($range_a . '' . $range_z);

        try {

            //  dd($request);

            DB::beginTransaction();
            $check_range = AccountTypes::get();
                //->pluck('fl_account_range_a');
            //$check_range_z = AccountTypes::all()->pluck('fl_account_range_z');

          // dd($check_range);
            foreach ($check_range as $range){
                // 3000 >= db_value  && 7000 <= db_value ------->this check for range

                if($range_a >= $range->fl_account_range_a && $range_a <= $range->fl_account_range_z ) {
                   // dump($range->fl_account_range_a . '_' . $range->fl_account_range_z);
                    return redirect()->back()->with('toast_error','The range is all ready been defined!!');
                }

            }
            AccountTypes::create($request->except(['_token']));
            DB::commit();
            return redirect()->back()->with('success','Saved Successfully');
        }catch (\Exception $exception){
            DB::rollback();
          //  dd($exception->getMessage());
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
        try {
            $account_type = AccountTypes::all()->where('fl_acc_type_code','=',$id)->first();
            return view('account_types.edit', compact('account_type'));
        } catch (\Exception $exception){
            return redirect()->back()->with('toast_error',  $exception->getMessage());
        }
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
        $validator = Validator::make($request->all(), [
            'fl_account_type_name' => 'required|min:3',
            'fl_account_range_a' => 'required_with:fl_account_range_z',
            'fl_account_range_z' => 'required_with:fl_account_range_a|integer|gt:fl_account_range_a'
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $range_a = $request->input('fl_account_range_a');
        $range_z = $request->input('fl_account_range_z');
        try {
            DB::beginTransaction();
            $check_range = AccountTypes::where('fl_acc_type_code', '=', !$id)->get();
            //->pluck('fl_account_range_a');
            //$check_range_z = AccountTypes::all()->pluck('fl_account_range_z');

            // dd($check_range);
            foreach ($check_range as $range){
                // 3000 >= db_value  && 7000 <= db_value ------->this check for range

                if($range_a >= $range->fl_account_range_a && $range_z <= $range->fl_account_range_z ) {
                    // dump($range->fl_account_range_a . '_' . $range->fl_account_range_z);
                    return redirect()->back()->with('toast_error','The range is all ready been defined!!');
                }

            }

            $account_type = AccountTypes::where('fl_acc_type_code','=',$id);
            $account_type->update($request->except(['_token', '_method']));
            DB::commit();
            return redirect('account/account-type')->withSuccess('Updated Successfully');
        }catch (\Exception $exception){
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
