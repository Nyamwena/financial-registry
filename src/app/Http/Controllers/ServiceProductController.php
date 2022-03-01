<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\ServiceResponsibility;
use App\Models\Services;
use Illuminate\Http\Request;

class ServiceProductController extends Controller
{


    public function  create_service_product(Request $request){

        try {
            $check_institution = Institute::all()->first();
            if (!$check_institution){
                return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
            }
            Services::create($request->except(['_token']));
            return redirect()->back()->withSuccess('Saved Successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }

    public  function assign_service(Request $request){
        try {
            ServiceResponsibility::create($request->except(['_token']));
            return redirect()->back()->withSuccess('Saved Successfully');
        }catch(\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
