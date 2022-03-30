<?php

namespace App\Http\Controllers;

use App\Models\AccountPeriod;
use App\Models\AccountPeriodDetail;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use function PHPUnit\Framework\throwException;

class AccountPeriodController extends Controller
{


    public function  index()
    {
        $check_institution = Institute::all()->first();
        if (!$check_institution){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        }
        $account_period = AccountPeriod::all()->where('fl_company_id','=', Session::get('company_session_id'));
        return view('account_period.add', compact('account_period'));
    }

    public function account_range_view($period_code){
        try {
            $period_det = AccountPeriodDetail::where(['fl_period_code' => $period_code, 'fl_company_id'=>Session::get('company_session_id')])->get();

            return view('account_period.view_ranges', compact('period_det'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    //save account period
    public function create(Request $request)
    {

        $this->validate($request,[
            'fl_date_a' =>'required|date',
            'fl_date_z'=>'required|date|after:fl_date_a',
            'fl_period_code' => 'unique:tbl_period_hdr'
        ]);
        try {
            DB::beginTransaction();
            $number = $request->input('number_of_periods');
            $date_a = $request->input('fl_date_a');
            $date_z = $request->input('fl_date_z');
            $period_code = $request->input('fl_period_code');
            $period_name = $request->input('fl_period_name');
            $timeStart = strtotime($date_a);
            $timeEnd   = strtotime($date_z);
            $out       = [];

            // dd($period_code);


            $milestones[] = $timeStart;
            $timeEndMonth = strtotime('+'.$number .'month', $timeStart);

            //dd($timeEndMonth);
            while ($timeEndMonth < $timeEnd) {
                $milestones[] = $timeEndMonth;
                $timeEndMonth = strtotime('+'.$number .'month', $timeEndMonth);
            }
            $milestones[] = $timeEnd;

            $count = count($milestones);
            for ($i = 1; $i < $count; $i++) {
                $out[] = [
                    'fl_dtl_date_a' => date('Y-m-d H:i:s', $milestones[$i-1]), // Here you can apply your formatting (like "date('Y-m-d H:i:s', $milestones[$i-1])") if you don't won't want just timestamp
                    'fl_dtl_date_z'   => date('Y-m-d H:i:s', $milestones[$i] - 1),
                    'fl_period_det_name' => $period_name.'-' . 0 + $i,
                    'fl_period_code' => $period_code,
                    'fl_company_id' => Session::get('company_session_id')
                ];
            }

            $account_period = AccountPeriod::create($request->except(['_token']));
            if ($account_period){
                AccountPeriodDetail::insert($out);
            }

            /*find the diff between dates
             * divide by the number stated and get the total number of days/months
             *
             */
            DB::commit();
            return redirect()->back()->with('success', 'Account Period Saved Successfully');
        } catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function create_period_detail(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request,[
            'fl_dtl_date_a' =>'required|date|after:yesterday',
            'fl_dtl_date_z'=>'required|date|after:fl_dtl_date_a',
        ]);


        try {


            $number = $request->input('number_of_periods');
            $date_a = $request->input('fl_date_a');
            $date_z = $request->input('fl_date_z');
            $period_code = $request->input('fl_period_code');
            $period_name = $request->input('fl_period_name');
            $timeStart = strtotime($date_a);
            $timeEnd   = strtotime($date_z);
            $out       = [];

            // dd($period_code);


            $milestones[] = $timeStart;
            $timeEndMonth = strtotime('+'.$number .'month', $timeStart);

            //dd($timeEndMonth);
            while ($timeEndMonth < $timeEnd) {
                $milestones[] = $timeEndMonth;
                $timeEndMonth = strtotime('+'.$number .'month', $timeEndMonth);
            }
            $milestones[] = $timeEnd;

            $count = count($milestones);
            for ($i = 1; $i < $count; $i++) {
                $out[] = [
                    'fl_dtl_date_a' => date('Y-m-d H:i:s', $milestones[$i-1]), // Here you can apply your formatting (like "date('Y-m-d H:i:s', $milestones[$i-1])") if you don't won't want just timestamp
                    'fl_dtl_date_z'   => date('Y-m-d H:i:s', $milestones[$i] - 1),
                    'fl_period_det_name' => $period_name.'-' . 0 + $i,
                    'fl_period_code' => $period_code
                ];
            }

            $account_period = AccountPeriod::create($request->except(['_token']));
            if ($account_period){
                AccountPeriodDetail::insert($out);
            }

            /*find the diff between dates
             * divide by the number stated and get the total number of days/months
             *
             */
            DB::commit();
            return redirect()->back()->with('success', 'Account Period Saved Successfully');

        } catch (\Exception $exception){
            DB::rollBack();
            //dd($exception->getMessage());
            return redirect()->back()->with('info', $exception->getMessage());
        }
    }

    public function open_close_account_period(Request $request): \Illuminate\Http\RedirectResponse
    {
        $period_code_fl = $request->input('fl_period_code');
        $open_close = $request->input('fl_closed');
        try {
            $check_open = AccountPeriod::all()->where('fl_closed','=',0)->count();
        // dd($check_open);
          //  there is open account and input is close
            //just go and close

            if($open_close == 1){
                $period_header = AccountPeriod::where(['fl_period_code' => $period_code_fl]);
                $period_header->update($request->except(['_token','period_code_fl']));
                return redirect()->back()->with('success', 'Record Processed Successfully');
            }
            if($check_open > 0){
                if($open_close == 1){
                    $period_header = AccountPeriod::where(['fl_period_code' => $period_code_fl]);
                    $period_header->update($request->except(['_token','period_code_fl']));
                    return redirect()->back()->with('success', 'Record Processed Successfully');
                } elseif($open_close == 0){
                    return redirect()->back()->with('info', 'Only account can be open!');
                }

            }
            elseif($open_close == 0 ){
                if($check_open > 0){
                    return redirect()->back()->with('info', 'Only account can be open!');
                }
                else{
                    $period_header = AccountPeriod::where(['fl_period_code' => $period_code_fl]);
                    $period_header->update($request->except(['_token','period_code_fl']));
                    return redirect()->back()->with('success', 'Record Processed Successfully');
                }
            }

//            else {
//                $period_header = AccountPeriod::where(['fl_period_code' => $period_code_fl]);
//                $period_header->update($request->except(['_token','period_code_fl']));
//                return redirect()->back()->with('success', 'Record Processed Successfully');
//            }
        }catch (\Exception $exception){
            return redirect()->back()->with('info', $exception->getMessage());
        }
    }


}
