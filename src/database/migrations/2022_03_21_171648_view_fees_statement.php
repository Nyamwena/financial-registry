<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE OR REPLACE VIEW vw_fees_statement
                  AS
                  SELECT
                    tbl_invoice_hdr.fl_practitioner_code as customer_account,
                     tbl_invoice_hdr.fl_invoice_number as invoice_number,
                    tbl_invoice_hdr.fl_amount_due as balance,
                   tbl_service.fl_service_name as service_name, null fees_paid, null payment_desc , null currency_name,
                   tbl_invoice_hdr.fl_invoice_date as trans_date

                  FROM
                    tbl_invoice_hdr
                    JOIN tbl_invoice_dtl ON tbl_invoice_dtl.fl_invoice_number = tbl_invoice_hdr.fl_invoice_number

                   JOIN tbl_service   ON  tbl_invoice_dtl.fl_service_code = tbl_service.fl_service_code

                   UNION ALL
                   SELECT  tbl_remittance_dtl.fl_customer_number AS customer_account, tbl_remittance_dtl.fl_invoice_number,
                   null balance, null service_name,
                   tbl_remittance_dtl.fl_remittance_line_amount as fees_paid, tbl_payment_type.fl_payment_descr as payment_desc,
                   tbl_currency.fl_currency_name as currency_name,
                   tbl_remittance_hdr.fl_remittance_date as trans_date
                   FROM
                   tbl_remittance_dtl

                   JOIN tbl_remittance_hdr ON tbl_remittance_dtl.fl_remittance_num = tbl_remittance_hdr.fl_remittance_num

                   JOIN tbl_payment_type ON tbl_remittance_hdr.fl_payment_code = tbl_payment_type.fl_payment_code

                  JOIN tbl_currency ON tbl_remittance_hdr.fl_currency_code =  tbl_currency.fl_currency_code
            "
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vw_fees_statement');
    }
};
