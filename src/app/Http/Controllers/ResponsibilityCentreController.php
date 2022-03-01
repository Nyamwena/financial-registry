<?php

namespace App\Http\Controllers;


use App\Models\AccountPeriod;
use App\Models\ChartAccounts;
use App\Models\Institute;
use App\Models\MicroService;
use App\Models\Responsibility;
use App\Models\ServiceResponsibility;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponsibilityCentreController extends Controller
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
       $centres = Responsibility::all();
       $account_numbers= ChartAccounts::all();
       $service_responsibility = ServiceResponsibility::all();
       $period_code = AccountPeriod::all()->where('fl_closed' ,'=',0);
       $service = Services::all();
        $microservice  = MicroService::all();
      //dd($period_code);
        return view('responsibility_centre.add',
            compact('centres','account_numbers','service_responsibility','period_code','service','microservice'));
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
     * @return \Illuminate\Http\Response
     */
    public function  create_centre(Request $request)
    {
        try {

            //  dd($request);
            DB::beginTransaction();
            Responsibility::create($request->except(['_token']));
            DB::commit();
            return redirect()->back()->with('toast_success','Saved Successfully');
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
