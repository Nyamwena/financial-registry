<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'tbl_consumer';
    protected $fillable = ['fl_consumer_number','fl_consumer_account',
        'fl_title','fl_firstname','fl_lastname','fl_middle_name','fl_sex',
        'fl_physical_address','fl_mailing_address','fl_city','fl_email',
        'fl_mobile_number','fl_telephone'];

    public function invoice_hdr(){
        return $this->hasOne(InvoiceHeader::class,'fl_practitioner_code','fl_consumer_account');
    }
}
