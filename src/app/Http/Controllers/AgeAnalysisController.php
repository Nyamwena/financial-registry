<?php

namespace App\Http\Controllers;

use App\Models\InvoiceHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgeAnalysisController extends Controller
{
    public function index(){


        try {
            $invoice_header = InvoiceHeader::with('invoice_details')
                ->where('fl_due_date', '<',Carbon::now())
                ->get();

            // dd($invoice_header->invoice_details->service->fl_service_name);
            return view('reports.age_analysis', compact('invoice_header'));
        } catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }

    }
}
