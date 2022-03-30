<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $table = 'tbl_service';

    protected $fillable = ['fl_service_name','fl_account_num','fl_service_dest','fl_company_id'];
}
