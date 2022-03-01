@extends('layouts.main')

@section('content')


    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Fees Statement
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Print</button>
            <div class="dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Export Word </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Export PDF </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: fees statement -->
    <div class="intro-y box overflow-hidden mt-5">
        <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-20 text-center sm:text-left">
            <div class="font-semibold text-theme-1 text-3xl">Fees Statement</div>
            <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                <div class="text-xl text-theme-1 font-medium">{{ $institute->fl_institution_name}}</div>
                <div class="mt-1">{{ $institute->fl_pysicaladd1}}</div>
                <div class="mt-1">{{ $institute->fl_email}}.</div>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-10 pb-10 sm:pb-20 text-center sm:text-left">
            <div>
                <div class="text-base text-gray-600">Student Details</div>
                <div class="text-lg font-medium text-theme-1 mt-2">
                    {{$client_details->fl_title}}  {{". "}} {{$client_details->fl_lastname}} {{" "}} {{$client_details->fl_firstname}}

                </div>
                <div class="mt-1">{{$client_details->fl_email}}</div>
                <div class="mt-1">{{$client_details->fl_physical_address}}</div>
            </div>
            <div class="mt-10 lg:mt-0 lg:ml-auto lg:text-right">
                <div class="text-base text-gray-600">Date</div>
                <div class="mt-1">{{" "}}</div>
            </div>
        </div>
        <div class="px-5 sm:px-16 py-10 sm:py-20">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">DESCRIPTION</th>
                        <th class="border-b-2 text-right whitespace-no-wrap">Dr</th>
                        <th class="border-b-2 text-right whitespace-no-wrap">Cr</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($remittance as $row)
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">
                                {{'payment'}}
                            </div>
                        </td>
                        <td class="text-right border-b w-32">
                            {{$row->fl_remittance_amount}}
                        </td>
                        <td class="text-right border-b w-32">
                            {{"-"}}
                        </td>

                    </tr>
                    @endforeach

                    @foreach($invoice as $row)
                        <tr>
                            <td class="border-b">
                                <div class="font-medium whitespace-no-wrap">
                                    {{$row->fl_invoice_number}}
                                </div>
                            </td>
                            <td class="text-right border-b w-32">
                                {{"-"}}
                            </td>
                            <td class="text-right border-b w-32">
                                {{$row->fl_amount_due}}
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
{{--            <div class="text-center sm:text-left mt-10 sm:mt-0">--}}
{{--                <div class="text-base text-gray-600">Bank Transfer</div>--}}
{{--                <div class="text-lg text-theme-1 font-medium mt-2">Elon Musk</div>--}}
{{--                <div class="mt-1">Bank Account : 098347234832</div>--}}
{{--                <div class="mt-1">Code : LFT133243</div>--}}
{{--            </div>--}}
            <div class="text-center sm:text-right sm:ml-auto">
                <div class="text-base text-gray-600">Balance</div>
                <div class="text-xl text-theme-1 font-medium mt-2">{{$balance}}</div>
            </div>
        </div>
    </div>
    <!-- END: fees statement -->

@endsection
