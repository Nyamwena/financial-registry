<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index(){

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
