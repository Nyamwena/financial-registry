<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethods extends Model
{
    use HasFactory;
    protected $table = 'tbl_payment_type';
    protected $fillable = [
        'fl_payment_descr',
        'fl_payment_short_code',
        'fl_paymethod_active',
    ];
}
