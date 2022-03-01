<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Institute;
use App\Models\InvoiceHeader;
use App\Models\Remittance;
use Illuminate\Http\Request;

class FeesStatementController extends Controller
{

    public function  index(){
        try {
            $customers = Customer::all();
            return view('reports.fees_statement_index', compact('customers'));
        }catch (\Exception  $exception){
            return  redirect()->back()->with('toast_error',$exception->getMessage());
        }
    }
    public function get_fees_statement($customer_account)
    {

        try {
            $balance  = null;
            $invoice_amount = InvoiceHeader::with('invoice_details')
                ->where('fl_practitioner_code','=', $customer_account)
                ->pluck('fl_amount_due')
                ->sum();

            $remittance_amount = Remittance::with('remittance_detail')
                ->where('fl_consumer_account','=' , $customer_account)
                ->pluck('fl_remittance_amount')
                ->sum();
//            if ($invoice_amount && $remittance_amount){
//
//            }

            $balance = $invoice_amount - $remittance_amount ;
            $invoice = InvoiceHeader::with('invoice_details')
                ->where('fl_practitioner_code','=', $customer_account)
                ->get();

            $remittance = Remittance::with('remittance_detail')
                ->where('fl_consumer_account','=' , $customer_account)
                ->get();

            $institute = Institute::all()->first();
            $client_details = Customer::where('fl_consumer_account', $customer_account)->first();

            return view('reports.fees_statement', compact('remittance_amount','invoice_amount',
                                                'invoice','remittance_amount','remittance','balance','institute','client_details'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
