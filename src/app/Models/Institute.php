<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;
    protected $table = 'tbl_institute';

    protected $fillable = [
        'fl_registration_code',
        'fl_date_registered',
        'fl_institution_name',
        'fl_institution_shortname',
        'fl_institution_type',
        'fl_pysicaladd1',
        'fl_pysicaladd2',
        'fl_pysicaladd3',
        'fl_mailadd1',
        'fl_mailadd2',
        'fl_mailadd3',
        'fl_gps_latitude',
        'fl_gps_longitude',
        'fl_telephone',
        'fl_faxnumber',
        'fl_mobilenumber',
        'fl_email',
        'fl_url',
        ''

    ];
}
