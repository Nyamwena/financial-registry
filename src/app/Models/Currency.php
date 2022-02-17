<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $table = 'tbl_currency';
    protected $fillable = [
        'fl_currency_name',
        'fl_currency_shortcode',
        'fl_currency_symbol',
        'fl_active',
    ];
}
