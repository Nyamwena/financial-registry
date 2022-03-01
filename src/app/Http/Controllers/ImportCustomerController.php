<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\U3StudentMember;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ImportCustomerController extends Controller
{
    public function  import()
    {

        try {
            $customers = Customer::all();
            return view('manage.import_customers', compact('customers'));
        }catch (\Exception  $exception){
            return  redirect()->back()->with('toast_error',$exception->getMessage());
        }
    }

    public function student_member_import(){

        $students = U3StudentMember::select('*')->distinct()->get();

       // dd($students);
        return view('manage.u3student_member',compact('students'));
    }

    public function import_students(Request  $request)
    {

        $student_number = $request->input('student_number',[]);
        $app_number = $request->input('application_number',[]);
        $first_name = $request->input('first_name',[]);
        $last_name = $request->input('last_name',[]);
        $middlename = $request->input('middlename',[]);
        $sex = $request->input('sex',[]);
        $address = $request->input('address',[]);
        $title = $request->input('title',[]);
        $mobile_number = $request->input('mobile_number',[]);
        $email =$request->input('email',[]);

        DB::beginTransaction();
        try {


            $student_member = [];
            foreach ( $student_number as $index=>$student){
                $student_member [] = [
                    'fl_consumer_number' => $student .'-'.$app_number[$index],
                    'fl_consumer_account' => $student,
                    'fl_title' => $title[$index],
                    'fl_lastname' => $last_name[$index],
                    'fl_firstname' => $first_name[$index],
                    'fl_middle_name' => $middlename[$index],
                    'fl_sex' => $sex[$index],
                    'fl_mobile_number' => $mobile_number[$index],
                    'fl_email' => $email[$index],
                    'fl_telephone' =>$mobile_number[$index],
                    'fl_physical_address' => $address[$index],
                    'fl_mailing_address' => $address[$index]
                ];
            }
            $studentInserted = Customer::insert($student_member);
            DB::commit();
            if($studentInserted){
                return  redirect()->back()->with('toast_success','Students Imported Successfully');
            }
        }catch (\Exception $exception){
            DB::rollBack();
            // dd($exception->getMessage());
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public function upload_customers(Request $request)
    {

        $request->validate([
            'upload_doc' => "required|mimes:xlsx|max:500000",
        ]);

        if($request->file('upload_doc')){

            $path = $request->file('upload_doc')->store('/marks_upload');

            //dd(storage_path());

            $excel_schedule =\PhpOffice\PhpSpreadsheet\IOFactory::load(storage_path().'/app/'.$path);

            $sheet = $excel_schedule->getActiveSheet();

            $cust_num_field = trim($sheet->getCell('A5')->getValue());
            $cust_acc_field = trim($sheet->getCell('B5')->getValue());
            $title_field = trim($sheet->getCell('C5')->getValue());
            $lastname_field = trim($sheet->getCell('D5')->getValue());
            $firstname_field = trim($sheet->getCell('E5')->getValue());
            $gender_field = trim($sheet->getCell('F5')->getValue());
            $phy_address_field = trim($sheet->getCell('G5')->getValue());
            $mailing_address_field = trim($sheet->getCell('H5')->getValue());
            $city_field = trim($sheet->getCell('I5')->getValue());
            $email_field = trim($sheet->getCell('J5')->getValue());
            $mobile_field = trim($sheet->getCell('K5')->getValue());
            $telephone_field = trim($sheet->getCell('L5')->getValue());

            $data_row = 6;
            $highestRow =  $sheet->getHighestRow();

            //dd($highestRow);

            $saving_errors = [];
            try {
                DB::beginTransaction();
                for($row=$data_row;$row<$highestRow+1;$row++){

                    $customer_number =$sheet->getCellByColumnAndRow(1, $row)->getValue();
                    $customer_account = $sheet->getCellByColumnAndRow(2, $row)->getValue();
                    $title = $sheet->getCellByColumnAndRow(3, $row)->getValue();
                    $lastname = $sheet->getCellByColumnAndRow(4, $row)->getValue();
                    $firstname = $sheet->getCellByColumnAndRow(5, $row)->getValue();
                    $gender = $sheet->getCellByColumnAndRow(6, $row)->getValue();
                    $physical_address = $sheet->getCellByColumnAndRow(7, $row)->getValue();
                    $mailing_address = $sheet->getCellByColumnAndRow(8, $row)->getValue();
                    $city = $sheet->getCellByColumnAndRow(9, $row)->getValue();
                    $email = $sheet->getCellByColumnAndRow(10, $row)->getValue();
                    $mobile = $sheet->getCellByColumnAndRow(11, $row)->getValue();
                   $telephone = $sheet->getCellByColumnAndRow(12, $row)->getValue();

                    $course_mark  =null;
                    $exam_mark = null;

                    //dd($exam_mark);

                    if($cust_acc_field !=null && $cust_acc_field && $lastname_field != null && $firstname_field != null && $title_field != null ){

                     $customer_insert = new Customer();
                        $customer_insert->fl_consumer_number = $customer_number;
                        $customer_insert->fl_consumer_account = $customer_account;
                        $customer_insert->fl_title = $title;
                        $customer_insert->fl_firstname = $firstname;
                        $customer_insert->fl_lastname = $lastname;
                        $customer_insert->fl_sex = $gender;
                        $customer_insert->fl_physical_address = $physical_address;
                        $customer_insert->fl_mailing_address = $mailing_address;
                        $customer_insert->fl_city = $city;
                        $customer_insert->fl_email = $email;
                        $customer_insert->fl_mobile_number = $mobile;
                        $customer_insert->fl_telephone = $telephone;
                        $customer_insert->save();

                        // dd($course_mark);

                    }

                }
                DB::commit();
            }catch (\Exception $exception){
                DB::rollBack();
                // dd($exception->getMessage());
                return  redirect()->back()->with('toast_error',$exception->getMessage());
            }
            toast('Upload successful','success');
            return back();
        }else{
            toast('Upload file not found','error');
            return back()->with('toast_error','Upload file not found');
        }

    }
}
