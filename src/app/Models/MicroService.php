<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicroService extends Model
{
    use HasFactory;

    protected $table = 'tbl_micro_services';
    protected $fillable = ['fl_service'];
}
