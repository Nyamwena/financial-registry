<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remittance extends Model
{
    use HasFactory;
    protected $table = 'tbl_remittance_hdr';

    protected  $primaryKey = 'fl_remittance_num';

    protected $fillable = ['fl_consumer_account','fl_remittance_date','fl_payment_code','fl_currency_code','fl_remittance_amount'];

    public function invoice_details(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(RemittanceDetail::class,'fl_remittance_num','fl_remittance_num');
    }

    public function remittance_detail(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(RemittanceDetail::class,'fl_remittance_num','fl_remittance_num');
    }

    public function payment_method(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PaymentMethods::class, 'fl_payment_code','fl_payment_code');
    }

    public function currency(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Currency::class, 'fl_currency_code','fl_currency_code');
    }

    public  function customer(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Customer::class, 'fl_customer_account','fl_customer_account');
    }

    public function customers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Customer::class, 'fl_customer_account','fl_customer_account');
    }
}
