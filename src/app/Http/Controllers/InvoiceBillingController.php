<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\FeesGroup;
use App\Models\FeesStructure;
use App\Models\InvoiceDetail;
use App\Models\InvoiceHeader;
use App\Models\InvoiceNumberGenerator;
use App\Models\U1AcademicSession;
use App\Models\U1Department;
use App\Models\U1ProgrammeOffer;
use App\Models\U3StudentMember;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceBillingController extends Controller
{


    public function bill_one(){

        $customers = Customer::all();
        return view('billing.bill', compact('customers'));
    }
    /**
     * @throws \Exception
     */
    public function create_billing(){

        try {
            $fees_group = FeesGroup::all();
            $students = null;
            if($fees_group){
                return view('billing.bulky_billing', compact('fees_group','students'));
            }else{
                throw  new \Exception('Something went wrong');

            }

        }catch (\Exception $exception){
        // throw new \Exception($exception->getMessage());
//            with('',);
            return  redirect()->back()->with('toast_error',$exception->getMessage());
        }
    }

    public function get_customers(Request $request){
        $students = [];
        $students_accounts = null;
        $fees_group = FeesGroup::all();
        $invoice_generator_prefix = InvoiceNumberGenerator::all()->pluck('fl_prefix')->first();
        $invoice_generator_num = InvoiceNumberGenerator::all()->pluck('fl_generator')->first();

        $incrementer = $invoice_generator_num +1;

        $fees_group_req = FeesGroup::where('fl_feegroup_code','=',$request->input('fee_group_code'))->get()->first();
        if($fees_group_req->fl_term_code == null && $fees_group_req->fl_minor_code1 == null){
            $u1_admin_structure = U1Department::where('id','=', $fees_group_req->fl_major_code1)->get()->first();
           // dd($u1_admin_structure->name);
            $u1_programme = U1ProgrammeOffer::where('adminStructCode', '=', $u1_admin_structure->id)->pluck('programmeCode');
            $fees_structure = FeesStructure::with('service')->where('fl_feegroup_code','=',$fees_group_req->fl_feegroup_code)->get();
            foreach ( $u1_programme as $programme){
                $students_accounts = U3StudentMember::where('programmeCode', '=', $programme )->get();
                if($students_accounts){
                    foreach ( $students_accounts as $account){
                        $students[] = Customer::where('fl_consumer_account','=', $account->studentNumber )->get()->first();
                    }
                }
            }
           // dd($students);
            return view('invoices.bulky_billing',compact('students','fees_group','fees_structure','incrementer','invoice_generator_num','invoice_generator_prefix'));

        }


        $u1_academic_session = U1AcademicSession::where('id','=',$fees_group->fl_term_code)->get()->first();

        //$u1_pr
    }

    public function bulk_billing(Request $request){
//        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
//        $charactersLength = strlen($characters);
//        $randomString = '';
//        for ($i = 0; $i < 3; $i++) {
//            $randomString .= $characters[rand(0, $charactersLength - 1)];
//        }
        try {
            $fee_structure_service = $request->input('fee_structure_service');
            $consumer_account = $request->input('fl_consumer_account',[]);
            $invoice_number = $request->input('invoice_num',[]);
            $service_due_date = $request->input('fl_service_date');
            $due_date = $request->input('fl_due_date');
            $id_generator = $request->input('invoice_generator');



            $invoice_header = [];
            $invoice_detail = [];
            $full_invoice_number = null;
            $idGenerator = null;
            $id = InvoiceNumberGenerator::all()->pluck('id')->first();

            $fees_service = FeesStructure::with('service')->where('id','=', $fee_structure_service)->get()->first();
            DB::beginTransaction();

            foreach ($consumer_account as $index=>$account){
                // $invoice_number = 'B'.'-'.$randomString. ;
                $invoice_header [] = [
                    'fl_invoice_number' => $invoice_number[$index],
                    'fl_practitioner_code' => $account,
                    'fl_invoice_date' => Carbon::now(),
                    'fl_service_date' => $service_due_date,
                    'fl_due_date' => $due_date,
                    'fl_amount_due' => $fees_service->fl_amount,
                    'fl_closed' => 0
                ] ;

                $invoice_detail [] = [
                    'fl_invoice_number' => $invoice_number[$index],
                    'fl_service_code' => $fees_service->service->fl_service_code,
                    'fl_unit_price' => $fees_service->fl_amount,
                    'fl_quantity' => 1,
                    'fl_tax_amount' => 0,
                    'fl_line_total' => $index ++
                ];

                if($index === array_key_last($consumer_account)){
                    $idGenerator = $id_generator;
                    $full_invoice_number = $invoice_number[$index];
                }
            }

            $inv_dtl =  InvoiceDetail::insert($invoice_detail);
            $inv_hdr = InvoiceHeader::insert($invoice_header);
            if( $inv_dtl && $inv_hdr){
                InvoiceNumberGenerator::where('id',$id)
                    ->update(['fl_generator'=>$idGenerator]);
                DB::commit();

                return redirect()->to('customer-billing/')->withSuccess('Students billed successfully');
            }


        }catch (\Exception $exception){
            return redirect()->to('customer-billing/')->with('toast_error', $exception->getMessage());
        }

    }
}
