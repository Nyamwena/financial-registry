<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesGroup extends Model
{
    use HasFactory;

    protected $table = 'tbl_fees_group';

    protected $fillable = ['fl_major_code','fl_minor_code1','fl_minor_code2','fl_term_code','fl_description'];
}
