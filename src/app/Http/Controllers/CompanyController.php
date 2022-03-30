<?php

namespace App\Http\Controllers;

use App\Models\AccountPeriod;
use App\Models\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    public function  index()
    {
        $companies = Institute::all();
        $check_company = Institute::all()->first();
        if ($check_company == null){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        } else{

            return view('company.select_company', compact('companies'));
        }

    }

    public function get_company_session(Request $request){
        try {
            Session::put('company_session_id', $request->input('company_id'));
            Session::save();
            if(Session::get('company_session_id')){
                return redirect()->to('/dashboard');
            }
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
