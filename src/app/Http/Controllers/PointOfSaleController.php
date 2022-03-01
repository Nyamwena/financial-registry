<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Customer;
use App\Models\Institute;
use App\Models\InvoiceDetail;
use App\Models\InvoiceHeader;
use App\Models\PaymentMethods;
use App\Models\Services;
use Illuminate\Http\Request;

class PointOfSaleController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $check_institution = Institute::all()->first();
        if (!$check_institution){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        }
       // $service = Services::where('fl_service_code',$invoice_dtl->fl_service_code)->get()->first();
        $currency = Currency::where('fl_active',1)->get();
        $payment_method = PaymentMethods::where('fl_paymethod_active',1)->get();
        $customers = Customer::join('tbl_invoice_hdr','fl_practitioner_code','fl_consumer_account')
                ->where('fl_closed', '=',0)->get();

       // dd($customer);
        return view('pos.index', compact('currency','payment_method','customers'));
    }



    public function search_customer(Request $request){

        try {
            if($request->ajax()){

                $output = '';
                $query = $request->get('query');

                if($query != ''){

                    $data =  Customer::where('fl_customer_number','like', '%'. $query .'%')
                            ->get();
                } else{
                   $data = Customer::paginate(10);
                }

                //($data);

                $total_row = $data->count();
                if($total_row > 0)
                {
                    foreach($data as $row)
                    {
                        $output .= '
                    <tr class="cursor-pointer ">

                                        <td class="border-b edit">
                                           '. $row->fl_consumer_account .'

                                        </td>
                                        <td class=" border-b">
                                           '. $row->fl_consumer_account .'

                                        </td>
                                        <td class=" border-b">

                                        '. $row->fl_consumer_account .'


                                        </td>

                        </tr>

                        ';
                    }
                }
                else
                {
                    $output = '
                         <td class=" border-b">

                                        No data found


                                        </td>
                    ';
                }
                $data = array(
                    'customer_data'  => $output,
                    'total_data'  => $total_row
                );

                echo json_encode($data);


            }

        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
