@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12" >
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                    <button class="button px-2 mr-1 mb-2 bg-theme-6 text-white"> <span class="w-auto h-auto flex items-center justify-center">
                            <i data-feather="activity" class="w-4 h-4"></i> </span>Total Sales: {{$remittance_total}}
                    </button>


                    <div class="intro-y box p-12">
                        <div  class="lg:flex intro-y">

                            <span class="text-sm px-2">
                                <a href="{{route('sales-report.daily')}}"  class="button justify-center block bg-theme-1 text-white ml-2 w-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Daily Sales Report
                                 </a>
                            </span>
                            <span class="text-sm px-2">
                                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"  class="button justify-center block bg-theme-1 text-white ml-2 w-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Sales Report with date Range
                                 </a>
                            </span>
                            <form action="{{route('sales-report.payment_type')}}" method="post">
                                @csrf

                                <select name="payment_code" id="" class="select2 input input--lg box w-full lg:w-full mt-3 lg:mt-0 ml-auto col-12"  onchange="this.form.submit()">
                                    <option value="" selected disabled>Generate report by payment type</option>
                                    @foreach($payment_type as $type)
                                        <option value="{{$type->fl_payment_code}}">{{$type->fl_payment_descr}}</option>
                                    @endforeach
                                </select>

                            </form>
                        </div>

                    </div>

                </div>


            </div>
        </div>

        <div class="col-span-12 lg:col-span-12">

            <div class="pos__ticket box p-2 mt-5" >
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <h1></h1>
                    <table id="data-source-1" class="table table-report table-report--bordered display  datatable w-full">
                        <caption class="text-2xl text-green-600">Sales Report</caption>
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">Customer Account</th>
                            <th class="border-b-2 whitespace-no-wrap">Date</th>
                            <th class="border-b-2 whitespace-no-wrap">Payment Method</th>
                            <th class="border-b-2 whitespace-no-wrap">Amount</th>
                        </tr>
                        </thead>
                        <tbody >

                        @isset($remittance)
                            @foreach($remittance as $sales)

                                <tr class="cursor-pointer">
                                    <td>{{$sales->fl_consumer_account}}</td>
                                    <td> {{$sales->fl_remittance_date}} </td>
                                    <td>{{$sales->payment_method->fl_payment_descr}}</td>
                                    <td>
                                        {{round($sales->remittance_detail->fl_remittance_line_amount, 2)}}
                                    </td>

                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>

    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content modal__content p-10 text-center">
            <form action="{{route('sales-report.range')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-span-6 sm:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">Select Date Range</h2>
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <label for="">Start Date</label>
                        <input type="date"  class="input w-full border flex-1"  name="date_a">
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <label for=""> End Date</label>
                        <input type="date"  class="input w-full border flex-1"  name="date_z">
                    </div>


                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button data-dismiss="modal" type="reset" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-auto bg-theme-1 text-white">Generate Report</button>
                </div>

            </form>

        </div>
    </div>

@endsection
