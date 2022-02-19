<?php

namespace App\Http\Controllers;

use App\Models\AccountTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('account_types.add');
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
            //dd($exception->getMessage());
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
