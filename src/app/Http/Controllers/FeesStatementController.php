<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\FeesStatement;
use App\Models\Institute;
use App\Models\InvoiceHeader;
use App\Models\Remittance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

            $fees_statement = FeesStatement::where(['customer_account' => $customer_account, 'company_id'=>Session::get('company_session_id')])
                            ->orderBy('trans_date', 'ASC')
                            ->get();

            $pluck_paid = FeesStatement::where(['customer_account'=> $customer_account, 'company_id'=>Session::get('company_session_id')])
                                        ->pluck('fees_paid')->sum();
            $pluck_owing =  FeesStatement::where(['customer_account' => $customer_account, 'company_id'=>Session::get('company_session_id')])
                            ->pluck('balance')->sum();

            //balance = fees_owing - fees_paid

            $balance  =  $pluck_owing - $pluck_paid;
          // dd( $pluck_owing .'-'. $pluck_paid . '='.  $balance);

            $institute = Institute::all()->first();
            $client_details = Customer::where('fl_consumer_account', $customer_account)->first();
            return view('reports.fees_statement', compact('fees_statement','balance','institute','client_details'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
