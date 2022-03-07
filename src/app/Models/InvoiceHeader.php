<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class InvoiceHeader extends Model
{
    use HasFactory;

    protected $table = 'tbl_invoice_hdr';

    protected $fillable = ['fl_closed','fl_invoice_date','fl_practitioner_code',
        'fl_service_date','fl_due_date','fl_amount_due','fl_invoice_number'];



    public function invoice_details(): HasOne
    {
        return  $this->hasOne(InvoiceDetail::class,'fl_invoice_number','fl_invoice_number');
    }
}
