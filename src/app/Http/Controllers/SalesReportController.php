<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use App\Models\Remittance;
use App\Models\RemittanceDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;

class SalesReportController extends Controller
{

    public function sales_report(){
        try {
            $remittance = Remittance::with('remittance_detail','currency','payment_method')
                ->where('fl_company_id', '=', Session::get('company_session_id'))
                ->get();

            $remittance_total = RemittanceDetail::all()
                ->where('fl_company_id', '=', Session::get('company_session_id'))
                ->pluck('fl_remittance_line_amount')->sum();

            $payment_type = PaymentMethods::all();

            return view('reports.sales_report', compact('remittance','remittance_total','payment_type'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }


    public function sales_report_daily(){
        try {
            $payment_type = PaymentMethods::all();
            $remittance = Remittance::with('remittance_detail')
                ->where('fl_remittance_date', '=', Carbon::now()->format('Y-m-d'))
                ->where('fl_company_id', '=', Session::get('company_session_id'))
                ->get();
               //dd(Carbon::now()->format('Y-m-d'));
            $remittance_total = RemittanceDetail::all()->where('fl_company_id', '=', Session::get('company_session_id'))
                ->pluck('fl_remittance_line_amount')->sum();

            return view('reports.sales_report_daily', compact('remittance','remittance_total','payment_type'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function sales_report_date_range(Request $request){

        $date_a = $request->input('date_a');
        $date_z = $request->input('date_z');
        $this->validate($request,[
            'date_a' =>'required|date',
            'date_z'=>'required|date|after:date_a',

        ]);
        try {

            $payment_type = PaymentMethods::all();
            $remittance = Remittance::with('remittance_detail')->where('fl_company_id', '=', Session::get('company_session_id'))
                ->whereBetween('fl_remittance_date', array($date_a,$date_z))
                ->get();

            $remittance_total ='';
                //Remittance::with('remittance_detail')
           //     ->whereBetween('fl_remittance_date', array($date_a,$date_z))
         //       ->pluck('fl_remittance_line_amount')->sum();

            return view('reports.sales_report_range', compact('remittance','remittance_total','payment_type'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function sales_report_payment_type(Request $request){
        try {
            $payment_type = PaymentMethods::all();
            $remittance_check = Remittance::with('remittance_detail')
                ->where('fl_payment_code', '=', $request->input('payment_code'))
                ->where('fl_company_id', '=', Session::get('company_session_id'))
                ->get()->first();

            $remittance = Remittance::with('remittance_detail')
                ->where('fl_payment_code', '=', $request->input('payment_code'))
                ->where('fl_company_id', '=', Session::get('company_session_id'))
                ->get();
           // dd($remittance);
            if($remittance_check == null){
                return redirect()->back()->with('toast_info','No sales made for this payment type' );
            }
            //dd(Carbon::now()->format('Y-m-d'));
            $remittance_total = RemittanceDetail::all()->where('fl_company_id', '=', Session::get('company_session_id'))
                ->pluck('fl_remittance_line_amount')->sum();

            return view('reports.sales_report_payment_type', compact('remittance','remittance_total','payment_type'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
