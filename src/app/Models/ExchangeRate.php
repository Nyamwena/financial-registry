<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;
    protected $table = 'tbl_exchange';
    protected $fillable = [
        'fl_bulletin_active',
        'fl_effective_date',
        'fl_currency_code',
        'fl_currency_code_dest',
        'fl_base_rate_amount',
        'fl_dest_rate',
    ];

    public function currency_base(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Currency::class,'fl_currency_code','fl_currency_code');
    }

    public function currency_dest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Currency::class,'fl_currency_code_dest','fl_currency_code');
    }

}
