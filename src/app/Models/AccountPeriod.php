<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPeriod extends Model
{
    use HasFactory;
    protected $table = 'tbl_period_hdr';
    protected $fillable=[
        'fl_period_code',
        'fl_period_name',
        'fl_date_a',
        'fl_date_z',
        'fl_closed',
        'fl_archived',
        'fl_company_id'
    ];
}
