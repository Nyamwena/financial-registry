<?php

namespace App\Http\Controllers;

use App\Models\Remittance;
use App\Models\RemittanceDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{

    public function sales_report(){
        try {
            $remittance = Remittance::with('remittance_detail','currency','payment_method')
                ->get();

            $remittance_total = RemittanceDetail::all()
                ->pluck('fl_remittance_line_amount')->sum();

            return view('reports.sales_report', compact('remittance','remittance_total'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }


    public function sales_report_daily(){
        try {
            $remittance = Remittance::with('remittance_detail')
                ->where('fl_remittance_date', '=', Carbon::now()->format('Y-m-d'))
                ->get();
               //dd(Carbon::now()->format('Y-m-d'));
            $remittance_total = RemittanceDetail::all()
                ->pluck('fl_remittance_line_amount')->sum();

            return view('reports.sales_report_daily', compact('remittance','remittance_total'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function sales_report_date_range(Request $request){

        $date_a = $request->input('date_a');
        $date_z = $request->input('date_z');
        try {
            $this->validate($request,[
                'date_a' =>'required|date',
                'date_z'=>'required|date|after:date_a',

            ]);
            $remittance = Remittance::with('remittance_detail')
                ->whereBetween('fl_remittance_date', array($date_a,$date_z))
                ->get();

            $remittance_total ='';
                //Remittance::with('remittance_detail')
           //     ->whereBetween('fl_remittance_date', array($date_a,$date_z))
         //       ->pluck('fl_remittance_line_amount')->sum();

            return view('reports.sales_report_range', compact('remittance','remittance_total'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
