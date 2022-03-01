<?php

namespace App\Http\Controllers;

use App\Models\FeesOrdinance;
use App\Models\Institute;
use Illuminate\Http\Request;

class OrdinanceController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $check_institution = Institute::all()->first();
        if (!$check_institution){
            return  redirect()->to('/institute')->with('toast_error', 'Please add institution details first');
        }

        $ordinance = FeesOrdinance::all();

        return view('ordinance.add', compact('ordinance'));
    }

    public function create_fees_ordinance(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            FeesOrdinance::create($request->except(['_token']));
            return redirect()->back()->withSuccess('Ordinance Saved Successfully');
        }catch (\Exception $exception){
            return redirect()->back()->with('toast_error', $exception->getMessage());
        }
    }
}
