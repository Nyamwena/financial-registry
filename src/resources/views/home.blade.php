@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">

                </h2>
                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <a href="{{route('pos.index')}}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="monitor" class="report-box__icon text-theme-10"></i>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6"></div>
                                <div class="text-base text-gray-600 mt-1">Fees Collection</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <a href="{{route('invoice.index')}}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="monitor" class="report-box__icon text-theme-11"></i>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6"></div>
                                <div class="text-base text-gray-600 mt-1">Pending Invoices</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <a href="">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="book-open" class="report-box__icon text-theme-12"></i>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{$remittance_amount}}</div>
                                <div class="text-base text-gray-600 mt-1">Total Revenue</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <a href="{{route('age-analysis.index')}}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="edit" class="report-box__icon text-theme-9"></i>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{$invoice_header}}</div>
                                <div class="text-base text-gray-600 mt-1">Age Analysis</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-span-12 xl:col-span-4 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Quick Menu
                </h2>
            </div>
            <div class="intro-y box p-5 mt-12 sm:mt-5">

                <div class="" >
                    <a href="{{route('import.index')}}" class="ml-auto text-theme-1 col-span-12 xl:col-span-6 mt-6" style="margin: 5px !important;" >
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Import Customers</div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="ml-auto  text-theme-1" style="margin: 5px !important;">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Edit</div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="ml-auto text-theme-1" style="margin: 5px !important;">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Add</div>
                            </div>
                        </div>
                    </a>

                    <a href="" class="text-theme-1" style="margin: 5px !important;">
                        <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                            <div class="ml-4 mr-auto">
                                <div class="font-medium">Add New</div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
