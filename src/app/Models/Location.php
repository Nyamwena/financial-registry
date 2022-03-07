<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $table = 'tbl_location';

    protected $fillable = [
      'fl_location_name','fl_city','fl_address'
    ];
}
