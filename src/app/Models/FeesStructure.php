<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesStructure extends Model
{
    use HasFactory;

    protected $table = 'tbl_fees_structure';

    protected $fillable = ['fl_feegroup_code','fl_ordinance_number',
        'fl_session_code','fl_currency_code','fl_amount','fl_service_code'];
}
