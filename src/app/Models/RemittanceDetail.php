<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemittanceDetail extends Model
{
    use HasFactory;
    protected $table = 'tbl_remittance_dtl';

    protected $fillable = [
      'fl_remittance_num','fl_invoice_number','fl_customer_number','fl_remittance_line_amount','fl_company_id','fl_receipt_number'
    ];

    public function invoice_header(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(InvoiceHeader::class,'fl_invoice_number','fl_invoice_number');
    }


}
