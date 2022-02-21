<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceResponsibility extends Model
{
    use HasFactory;

    protected $table = 'tbl_responsible_service';

    protected $fillable = [
      'fl_centre_code', 'fl_service_code','fl_period_code'
    ];
}
