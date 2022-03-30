<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesOrdinance extends Model
{
    use HasFactory;

    protected $table = 'tbl_ordinance';
    protected $fillable = ['fl_desc','fl_date_a','fl_date_z','fl_active','fl_company_id'];
}
