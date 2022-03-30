<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesStructure extends Model
{
    use HasFactory;

    protected $table = 'tbl_fees_structure';

    protected $fillable = ['fl_feegroup_code','fl_ordinance_number',
        'fl_session_code','fl_currency_code','fl_amount','fl_service_code','fl_company_id'];

    public function  service(){
        return $this->hasOne(Services::class,'fl_service_code','fl_service_code');
    }
    public function fees_group(){
        return $this->belongsTo(FeesGroup::class,'fl_feegroup_code','fl_feegroup_code');
    }

    public function ordinance(){
        return $this->belongsTo(FeesOrdinance::class,'fl_ordinance_number','fl_ordinance_number');
    }
    public function currency(){
        return $this->belongsTo(Currency::class,'fl_currency_code','fl_currency_code');
    }
}
