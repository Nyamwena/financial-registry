<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPeriodDetail extends Model
{
    use HasFactory;

    protected $table = 'tbl_period_dtl';
    protected $fillable = [
      'fl_period_det_name',
      'fl_dtl_date_a',
      'fl_dtl_date_z',
    ];
}
