<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartAccounts extends Model
{
    use HasFactory;
    protected $table = 'tbl_chart';
    protected $fillable = [
        'fl_account_num',
        'fl_account_name',
        'fl_account_main_type',
        'fl_account_sub_type_a',
        'fl_account_sub_type_b',
        'fl_account_bank',
    ];

    public function account_type_main(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccountMainType::class,'fl_account_main_type','id');
    }
    public function account_type_a(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccountTypes::class,'fl_account_sub_type_a','fl_acc_type_code');
    }

    public function account_type_b(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccountTypes::class,'fl_account_sub_type_b','fl_acc_type_code');
    }
}
