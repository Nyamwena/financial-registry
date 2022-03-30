<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;
    protected $table = 'tbl_payment_plan';
    protected $primaryKey = 'fl_payment_plan_ref';

    protected $fillable = [
      'fl_request_date','fl_customer_number','fl_recommended_a',
        'fl_recommended_b','fl_date_recommended_b',
        'fl_date_recommended_a','fl_approved_by','fl_approved_date',
        'fl_plan_amount','fl_instalments','fl_company_id'
    ];

    public function payment_terms(){
        return $this->hasOne(PaymentTerm::class,'fl_payment_plan_ref','fl_payment_plan_ref');
    }
}
