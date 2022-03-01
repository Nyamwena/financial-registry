<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\PaymentMethods;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(){
        $check_institution = Institute::all()->first();
        if (!$check_institution){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        }
        $payment_methods = PaymentMethods::all();

        return view('payment_method.add', compact('payment_methods'));
    }


    public function create_payment_method(Request $request){

        try {
            PaymentMethods::create($request->except(['_token']));
            return redirect()->back()->withSuccess('Payment Method Added Successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }

    }
}
