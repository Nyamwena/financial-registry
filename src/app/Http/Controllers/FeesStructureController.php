<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\FeesGroup;
use App\Models\FeesOrdinance;
use App\Models\FeesStructure;
use App\Models\Institute;
use App\Models\Services;
use App\Models\U1AcademicSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeesStructureController extends Controller
{


    public function index(){
/*
 * 'fl_feegroup_code','fl_ordinance_number',
        'fl_session_code','fl_currency_code','fl_amount','fl_service_code'
 *
 */
        try {

            $check_institution = Institute::all()->first();
            if (!$check_institution){
                return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
            }
            $fees_grp = FeesGroup::all();
            $ordinance = FeesOrdinance::all();
            $session = U1AcademicSession::where('status', '=', 'Active')->get();
            $service_code = Services::all();
            $currency = Currency::where('fl_active','=',1)->get();
          //  dd($session);
            if(!$fees_grp && !$ordinance && !$session && !$service_code && !$currency){
                return  redirect()->back()->with('info', 'Some parameters are missing ');
            }else{
                return view('fees_structure.add' , compact('fees_grp',
                    'ordinance','session','service_code','currency'));
            }

        }catch (\Exception $exception){
            return  redirect()->back()->with('info', $exception->getMessage());
        }
    }

    public function create_fees_structure(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
                FeesStructure::create($request->except(['_token']));
            DB::commit();
            return redirect()->back()->with('success', 'Fees Structure Saved Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return  redirect()->back()->with('info', $exception->getMessage());
        }
    }
}
