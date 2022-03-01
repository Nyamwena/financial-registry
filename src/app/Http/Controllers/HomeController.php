<?php

namespace App\Http\Controllers;

use App\Models\InvoiceHeader;
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
        return view('home', compact('remittance_amount','invoice_header'));
    }
}
