@extends('layouts.main')

@section('content')

    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                    <div class="font-medium text-base"></div>

                </div>


            </div>
        </div>
        <!-- END: Item List -->
        <!-- BEGIN: Ticket -->
        <div class="col-span-12 lg:col-span-12">

            <div class="pos__ticket box p-2 mt-5" >
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <h1></h1>
                    <table id="data-source-1" class="table table-report table-report--bordered display  datatable w-full">
                        <caption class="text-2xl text-green-600">customer  list</caption>
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">Customer Account</th>
                            <th class="border-b-2 whitespace-no-wrap">Customer Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Email</th>
                            <th class="border-b-2 whitespace-no-wrap">Contact</th>
                            <th class="border-b-2 whitespace-no-wrap">Action</th>
                        </tr>
                        </thead>
                        <tbody >


                        @foreach($customers as $customer)
                            <tr class="cursor-pointer">
                                <td>{{$customer->fl_consumer_account}}</td>
                                <td>{{$customer->fl_title}} {{'.'}} {{ " " }} {{$customer->fl_lastname}}{{ " " }} {{$customer->fl_firstname}}  </td>
                                <td>{{$customer->fl_email}}</td>
                                <td>Mobile#:  {{$customer->fl_mobile_number}}<br>
                                    Telephone#: {{$customer->fl_telephone}}
                                </td>
                                <td>
                                    <div class="flex sm:justify-center items-center">
                                        <a class="flex items-center mr-3" href="{{route('fees-report.get-statement',$customer->fl_consumer_account)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                            View Fees Statement
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- END: Ticket -->
    </div>
@endsection
