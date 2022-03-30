<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\InvoiceHeader;
use App\Models\PaymentPlan;
use App\Models\Remittance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {

            if(Session::get('company_session_id')){
              //  dd(Session::get('company_session_id'));
                $remittance_amount = Remittance::with('remittance_detail')
                    ->where('fl_company_id','=',Session::get('company_session_id'))
                    ->pluck('fl_remittance_amount')
                    ->sum();
               // dd($remittance_amount);
                $invoice_header = InvoiceHeader::with(['invoice_details'])
                    ->where('fl_due_date', '<',Carbon::now())
                    ->where('fl_company_id','=',Session::get('company_session_id'))
                    ->count();

                $payment_plan_approve = PaymentPlan::where('fl_approved_by','=', null)
                    ->where('fl_company_id','=',Session::get('company_session_id'))
                    ->count();


                $payment_plan = PaymentPlan::where('fl_recommended_a', '=', null)
                    ->where('fl_company_id','=',Session::get('company_session_id'))
                    ->orWhere('fl_recommended_b', '=', null)->count();
                $company_id = Session::get('company_session_id');
                $company_data = Institute::where(['fl_system_code'=>$company_id])->pluck('fl_institution_name')->first();

                return view('home', compact('remittance_amount','invoice_header','payment_plan','payment_plan_approve','company_data'));
            } else{
                return redirect()->to('/')->with('toast_info', 'Please select a company first to proceed');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }

    }
}
