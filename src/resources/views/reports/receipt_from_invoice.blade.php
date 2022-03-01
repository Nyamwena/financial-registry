<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <style>
        .invoice-box {
            max-width:100%;
            max-height: 100%;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="" style="width: 100%; max-width: 300px"  alt="Univeristy Logo"/>
                        </td>

                        <td>
                            {{$institute->fl_institution_name}}<br />
                            {{$institute->fl_pysicaladd1}} , {{$institute->fl_pysicaladd1}}<br />
                           Telephone: {{$institute->fl_telephone}} <br>
                            Mobile: {{$institute->fl_mobilenumber}} <br>
                            Email: {{$institute->fl_mobilenumber}} <br>
                            Website: {{$institute->fl_email}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="heading" style="width: 100%">
            <td>Receipt</td>

        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>

                        <td>
                            {{--                           @foreach($student_bio as $student)--}}
                            Invoice #: {{$receipt->remittance_detail->fl_invoice_number}}<br />
                            Customer Account: {{$receipt->fl_consumer_account}}<br />
                            Remittance Date: {{$receipt->fl_remittance_date}} <br>
                            Payment Method: {{$receipt->payment_method->fl_payment_descr}}<br>
                            Currency: {{$receipt->currency->fl_currency_name}}
                        </td>


                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading" style="width: 100%">
            <td>Customer Account: {{$receipt->fl_consumer_account}} </td>

        </tr>

        <tr>
            <td>

            </td>
        </tr>


            <tr class="heading">
                <td>Remittance Amount</td>
                <td>Service Paid For</td>

            </tr>

                <tr class="item">

                    <td>{{$receipt->fl_remittance_amount}}</td>

                    <td>{{$remittance_detail->fl_service_name}}</td>

                </tr>


    </table>
</div>
</body>
</html>
