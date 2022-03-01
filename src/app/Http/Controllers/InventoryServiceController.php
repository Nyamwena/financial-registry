<?php

namespace App\Http\Controllers;

use App\Models\Institute;
use App\Models\InventoryService;
use App\Models\MicroService;
use Illuminate\Http\Request;

class InventoryServiceController extends Controller
{

    public function  index(){
        try {
            $check_institution = Institute::all()->first();
            if (!$check_institution){
                return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
            }
            $microservice = MicroService::all();
            $service_inv = InventoryService::all();

            return view('inventory.add', compact('microservice','service_inv'));
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }

    }

    public function create_products(Request $request){

        try {
            InventoryService::create($request->except(['_token']));
           return redirect()->back()->withSuccess('Saved Successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }



}
