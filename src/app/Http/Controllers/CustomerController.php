<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){

        $customers = Customer::all();
        return view('manage.add_new_customer', compact('customers'));
    }

    public function create(Request $request){

        $request->validate([
            'fl_consumer_number' => "required|unique:tbl_consumer",
            'fl_consumer_account' => "required|unique:tbl_consumer"
        ]);

        try {


        DB::beginTransaction();
            Customer::create($request->except(['_token']));
        DB::commit();
            return redirect()->back()->withSuccess('Saved Successfully');
        }catch (\Exception $exception){
            DB::rollBack();
            return  redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
