<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_invoice_dtl';

    public function service()
    {
        return $this->hasOne(Services::class, 'fl_service_code','fl_service_code');
    }
}
