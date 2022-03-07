<?php

namespace App\Http\Controllers;

use App\Models\InvoiceHeader;
use App\Models\PaymentPlan;
use App\Models\Remittance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $remittance_amount = Remittance::with('remittance_detail')
            ->pluck('fl_remittance_amount')
            ->sum();
        $invoice_header = InvoiceHeader::with(['invoice_details'])
            ->where('fl_due_date', '<',Carbon::now())
            ->count();

       $payment_plan_approve = PaymentPlan::where('fl_approved_by','=', null)
                                ->count();


        $payment_plan = PaymentPlan::where('fl_recommended_a', '=', null)
            ->orWhere('fl_recommended_b', '=', null)->count();

        return view('home', compact('remittance_amount','invoice_header','payment_plan','payment_plan_approve'));
    }
}
