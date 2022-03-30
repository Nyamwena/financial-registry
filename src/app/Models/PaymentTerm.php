<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTerm extends Model
{
    use HasFactory;
    protected $table ='tbl_payment_terms';

    protected $fillable = [
      'fl_payment_plan_ref','fl_line_number',
        'fl_instalment _type','fl_instalment _amount',
        'fl_instalment_due_date','fl_company_d'
    ];
}
