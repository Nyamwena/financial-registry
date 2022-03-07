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
                ->where('fl_remittance_date', '=', Carbon::now())
                ->get();
               // dd(Carbon::now());
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
            $remittance = Remittance::with('remittance_detail')
                ->where('fl_remittance_date', '', Carbon::now())
                ->get();

            $remittance_total = Remittance::with('remittance_detail')
                ->pluck('fl_remittance_line_amount')->sum();

            return view('reports.sales_report_range', compact('remittance','remittance_total'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
