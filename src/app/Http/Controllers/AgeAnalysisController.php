<?php

namespace App\Http\Controllers;

use App\Models\InvoiceHeader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AgeAnalysisController extends Controller
{
    public function index(){


        $invoice_header = InvoiceHeader::with(['invoice_details'])
            ->where('fl_due_date', '<',Carbon::now())
            ->get();

       // dd($invoice_header);
        return view('reports.age_analysis', compact('invoice_header'));

    }
}
