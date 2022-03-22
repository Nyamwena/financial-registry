<?php

namespace App\Http\Controllers;

use App\Models\FeesGroup;
use App\Models\Institute;
use App\Models\U1AcademicSession;
use App\Models\U1Department;
use App\Models\U1Programme;
use App\Models\U2IntakeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeesGroupController extends Controller
{


    public function index(){
        $check_institution = Institute::all()->first();
        if (!$check_institution){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        }
        $dept_code = U1Department::all();
        $session = U1AcademicSession::where('status', '=', 'Active')->get();


        $programme_code = U1Programme::all();
        $intake_type = U2IntakeType::all();
        $fees_grp = FeesGroup::all();

        return view('fees_grp.add', compact('dept_code','session','programme_code','intake_type','fees_grp'));
    }

    public function  create_fees_group(Request $request){
            $major_code = $request->input('fl_major_code');
            $minor_code1 = $request->input('fl_minor_code1',[]);
            $minor_code2 = $request->input('fl_minor_code2');
            $term_code = $request->input('fl_term_code');
            $description = $request->input('fl_description');

           // dd($minor_code2);
        try {
            $fees_group = [];
                DB::beginTransaction();
            foreach ($minor_code1 as $index=>$fees){
                $fees_group [] = [
                    'fl_description' => $description,
                    'fl_major_code1' => $major_code,
                    'fl_minor_code1' => $minor_code1[$index],
                    'fl_minor_code2' => $minor_code2,
                    'fl_term_code' => $term_code
                    ];
            }
            $fees_save = FeesGroup::insert($fees_group);
            DB::commit();
            if ($fees_save){
                return redirect()->back()->withSuccess('Fees group added successfully');
            }
        }catch (\Exception $exception){
            DB::rollBack();
            return  redirect()->back()->with('toast_error', $exception->getMessage());

        }

    }
}
