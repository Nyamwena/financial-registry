<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Institute;
use App\Models\InvoiceDetail;
use App\Models\InvoiceHeader;
use App\Models\PaymentMethods;
use App\Models\Remittance;
use App\Models\RemittanceDetail;
use App\Models\Services;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        try {
            $invoice_hdr = InvoiceHeader::where('fl_closed',0)->get();
            return view('invoices.index', compact('invoice_hdr'));
        }catch (\Exception $exception){
            return  redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function process_invoice($invoice_number){

        try {
            $invoice_hdr = InvoiceHeader::where('fl_invoice_number',$invoice_number)->get()->first();

            $invoice_dtl = InvoiceDetail::where('fl_invoice_number',$invoice_number)->get()->first();

            $service = Services::where('fl_service_code',$invoice_dtl->fl_service_code)->get()->first();
            $currency = Currency::where('fl_active',1)->get();
            $payment_method = PaymentMethods::where('fl_paymethod_active',1)->get();

            return view('pos.invoice_process',
                compact('invoice_hdr','invoice_dtl','service','currency','payment_method'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }

    }


    public function post_process_invoice(Request $request){
        try {

           // dd($request->input('fl_remittance_amount'));
            $check_if_amount = InvoiceHeader::where(['fl_invoice_number'=> $request->input('fl_invoice_number')])
                ->pluck('fl_amount_due')->first();
            $check_amount_paid = RemittanceDetail::where(['fl_invoice_number'=> $request->input('fl_invoice_number')])
                ->pluck('fl_remittance_line_num')->first();
            $amount_total = $check_if_amount + $check_amount_paid;
           // dd($check_if_amount);
            //if 200 >= 2000
            DB::beginTransaction();
                    $remittance_hdr = Remittance::create($request->except(['_token']));
                     $remittance_hdr->invoice_details()->create([
                         'fl_invoice_number' => $request->input('fl_invoice_number'),
                         'fl_customer_number' => $request->input('fl_consumer_account'),
                         'fl_remittance_line_amount' => $request->input('fl_remittance_amount')
                     ]);

                     if( $request->input('fl_remittance_amount') >=  $amount_total  ){
                         InvoiceHeader::where(['fl_invoice_number'=> $request->input('fl_invoice_number')])
                             ->update(['fl_closed'=>1]);
                     }
            DB::commit();
           // dd($remittance_hdr->getKey('fl_remittance_num'));
            return redirect()->to('invoice/generate/receipt/'.$remittance_hdr->getKey('fl_remittance_num'));
        }catch (\Exception $exception){
            DB::rollBack();
           return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function generate_receipt($remittance_id){

        try {

            $institute = Institute::all()->first();
            $receipt = Remittance::with(['remittance_detail','payment_method','currency'])->where('fl_remittance_num', $remittance_id)->get()->first();

            $remittance_detail = RemittanceDetail::join('tbl_invoice_hdr','tbl_remittance_dtl.fl_invoice_number','=','tbl_invoice_hdr.fl_invoice_number')
                                                ->join('tbl_invoice_dtl','tbl_invoice_hdr.fl_invoice_number','=','tbl_invoice_dtl.fl_invoice_number')
                                                ->join('tbl_service','tbl_invoice_dtl.fl_service_code','=','tbl_service.fl_service_code')
                                                ->where('fl_remittance_num', $remittance_id)->get()->first();

            $summary_data = Array(

                'institute' => $institute,
                'receipt' => $receipt,
                'remittance_detail' =>$remittance_detail,

            );


            $pdf = PDF::loadView('reports.receipt_from_invoice', $summary_data);


            //   dd($data);

            // download PDF file with download method
            return $pdf->stream( $receipt->fl_invoice_number.'_'.$receipt->fl_consumer_account.'_receipt.pdf', array('Attachment'=>0));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

}
