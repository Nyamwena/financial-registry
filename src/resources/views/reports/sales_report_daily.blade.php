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
                                <a href="javascript:;"  class="button justify-center block bg-theme-1 text-white ml-2 w-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Sales Report with date Range
                                 </a>
                            </span>
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

@endsection
