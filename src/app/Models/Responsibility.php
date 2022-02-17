<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
    use HasFactory;
    protected $table = 'tbl_responsibility';
    protected $fillable =[
        'fl_centre_short_code',
        'fl_centre_name',

    ];
}
