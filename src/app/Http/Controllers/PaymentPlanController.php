<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PaymentPlan;
use App\Models\PaymentTerm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentPlanController extends Controller
{
    public function index()
    {
        $payment_plan = PaymentPlan::all();
        $customers = Customer::all();
        return view('payment_plan.add', compact('payment_plan','customers'));
    }

    public function store(Request $request)
    {
//        $this->validate($request,[
//            'fl_date_recommended_a' =>'required|date|after:fl_request_date',
//            'fl_date_recommended_b'=>'required|date|after:fl_request_date',
//            'fl_approved_date'=>'required|date|after:fl_request_date',
//            'fl_payment_plan_ref' => 'unique:tbl_payment_plan',
//        ]);
      $amount = $request->input('fl_plan_amount');
      $due_date = $request->input('due_date');


        try {
            DB::beginTransaction();
           $payment_plan = PaymentPlan::create($request->except(['_token']));

           PaymentTerm::create(
                [   'fl_payment_plan_ref' => $payment_plan->fl_payment_plan_ref,
                    'fl_instalment _amount' => $amount,
                    'fl_instalment_due_date' => $due_date
                ]
            );
            DB::commit();
            return redirect()->back()->withSuccess('Payment Plan Saved Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }


    }
    public function recommend_index(){
        try {
            $payment_plans = PaymentPlan::where('fl_recommended_a', '=', null)
                ->orWhere('fl_recommended_b', '=', null)->get();
            return  view('payment_plan.recommend', compact('payment_plans'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
    public function recommend_plan(Request $request){
        $payment_plan_ref = $request->input('reco_id');
        try {
                $approve = PaymentPlan::where(['fl_payment_plan_ref' => $payment_plan_ref]);
                $check_if = PaymentPlan::where(['fl_payment_plan_ref' => $payment_plan_ref])
                        ->pluck('fl_recommended_a')->first();
                if($check_if == null){
                    $approve->update([
                        'fl_recommended_a' => Auth::user()->firstname .' '.Auth::user()->surname,
                        'fl_date_recommended_a' => Carbon::now()
                    ]);
                } else {
                    $approve->update([
                        'fl_recommended_b' => Auth::user()->firstname .' '.Auth::user()->surname,
                        'fl_date_recommended_b' => Carbon::now()
                    ]);
                }

                DB::commit();
            return redirect()->back()->withSuccess('Saved Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }


    public function approve_index(){
        try {
            $payment_plans = PaymentPlan::where('fl_approved_by', '=', null)->get();
            return  view('payment_plan.approve', compact('payment_plans'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function approve_plan(Request $request){
        $payment_plan_ref = $request->input('approve_id');
        try {

            $check_if = PaymentPlan::where(['fl_payment_plan_ref' => $payment_plan_ref])
                ->pluck('fl_recommended_a')->first();

            $check_if_b = PaymentPlan::where(['fl_payment_plan_ref' => $payment_plan_ref])
                ->pluck('fl_recommended_b')->first();

            if($check_if == null || $check_if_b == null ){
               return redirect()->back()->with('info', 'Can not approve without any of the recommendations');
            }else{
                $approve = PaymentPlan::where(['fl_payment_plan_ref' => $payment_plan_ref]);
                $approve->update([
                    'fl_approved_by' => Auth::user()->firstname .' '.Auth::user()->surname,
                    'fl_approved_date' => Carbon::now()
                ]);
            }
            DB::commit();
            return redirect()->back()->withSuccess('Saved Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $this->validate($request,[
            'fl_date_recommended_a' =>'required|date|after:fl_request_date',
            'fl_date_recommended_b'=>'required|date|after:fl_request_date',
            'fl_approved_date'=>'required|date|after:fl_request_date',
            'fl_payment_plan_ref' => 'unique:tbl_payment_plan',
            'fl_recommended_a'=> 'required|string',
            'fl_recommended_b'=> 'required|string',
            'fl_approved_by' => 'required|string',
        ]);

        try {
            DB::beginTransaction();
            $update_payment_plan = PaymentPlan::where(['fl_payment_plan_ref' => $request->input('fl_payment_plan_ref')]);
            $update_payment_plan->update($request->except(['_token']));
            DB::commit();
            return redirect()->back()->withSuccess('Payment Plan Saved Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }

    }
}
