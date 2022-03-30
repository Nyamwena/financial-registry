<?php

namespace App\Http\Controllers;


use App\Models\AccountPeriod;
use App\Models\ChartAccounts;
use App\Models\Institute;
use App\Models\MicroService;
use App\Models\Responsibility;
use App\Models\ServiceResponsibility;
use App\Models\Services;
use App\Models\ShortCodeGen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
       $centres = Responsibility::all()->where('fl_company_id','=', Session::get('company_session_id'));
       $account_numbers= ChartAccounts::all()->where('fl_company_id','=', Session::get('company_session_id'));
       $service_responsibility = ServiceResponsibility::all()->where('fl_company_id','=', Session::get('company_session_id'));
       $period_code = AccountPeriod::all()->where('fl_closed' ,'=',0)->where('fl_company_id','=', Session::get('company_session_id'));
       $service = Services::all();
        $microservice  = MicroService::all();
        $access_service= ServiceResponsibility::with('centre_name','service_name',
            'account_periods')->where('fl_company_id','=', Session::get('company_session_id'))
            ->get();
        $short_code_prefix = ShortCodeGen::all()->pluck('fl_prefix')->first();
        $short_code_generator = ShortCodeGen::all()->pluck('fl_generator')->first();
      //  dd($access_service);
      //dd($period_code);
        return view('responsibility_centre.add',
            compact('centres','account_numbers','service_responsibility','period_code','service',
                'microservice','access_service','short_code_generator','short_code_prefix'));
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
            $respo = Responsibility::create($request->except(['_token']));
            if($respo){
                $id = ShortCodeGen::all()->pluck('id')->first();
                $increment = ShortCodeGen::all()->pluck('fl_generator')->first();
                ShortCodeGen::where(['id'=>$id])->update(['fl_generator' => $increment +1 ]);
            }
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
