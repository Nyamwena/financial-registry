<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTypes extends Model
{
    use HasFactory;
    protected $table = 'tbl_account_type';
    protected $fillable = [
        'fl_account_type_name',
        'fl_account_range_a',
        'fl_account_range_z',
        'fl_company_id'
    ];
}
