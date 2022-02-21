@extends('layouts.main')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button text-white bg-theme-1 shadow-md mr-2">
            Add Service / Products
        </a>
        <a href="javascript:;" data-toggle="modal" data-target="#assign-service" class="button text-white bg-theme-1 shadow-md mr-2">
            Assign Services to Centers
        </a>

        <a href=""  class="button text-white bg-theme-1 shadow-md mr-2">
           Service - Responsibility Centers
        </a>
    </div>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-4">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('center.responsibility-centre-store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-12">
                                <div class="mb-2">Centre Short Code</div>
                                <input type="text" class="input w-full border flex-1" name="fl_centre_short_code"  required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-12">
                                <div class="mb-2">Centre Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_centre_name"  required>
                                <span id="error_code"></span>
                            </div>


                            <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                <button type="reset" class="button w-24 justify-center block bg-red-200 text-gray-600">Reset</button>
                                <button type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>

        <div class="intro-y col-span-6 lg:col-span-8">
            <!-- BEGIN: Form Layout -->



            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <h1></h1>
                <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
                    <caption class="text-2xl text-green-600">Exchange Rate</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Exchange Rate ID</th>
                        <th class="border-b-2 whitespace-no-wrap">Base Currency</th>
                        <th class="border-b-2 whitespace-no-wrap">Destination  Currency</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    {{--                    @foreach($exchange_rate as $rate)--}}
                    <tr>

                        <td class=" border-b">
                            {{--                                {{$rate->fl_currency_code->fl_exchange_bulletino}}--}}
                            Test
                        </td>
                        <td class=" border-b">
                            {{--                                {{$rate->fl_currency_name}} <br>--}}
                            {{--                                {{$rate->fl_currency_code->fl_base_rate_amount}}--}}
                            Test
                        </td>
                        <td class=" border-b">

                            {{--                                {{$rate->fl_currency_name}} <br>--}}
                            {{--                                {{$rate->fl_currency_code->fl_dest_rate}}--}}
                            Test
                        </td>
                        <td class=" border-b">
                            {{--                                @if($rate->fl_currency_code->fl_bulletin_active == 1)--}}
                            {{--                                    Yes--}}
                            {{--                                @elseif($rate->fl_currency_code->fl_bulletin_active == 0)--}}
                            {{--                                    No--}}
                            {{--                                @endif--}}
                            Test
                        </td>

                        {{--                            <td class="border-b w-5">--}}
                        {{--                                <div class="flex sm:justify-center items-center">--}}
                        {{--                                    <a class="flex items-center mr-3 edit" href="#" data-toggle="modal"--}}
                        {{--                                       data-target="#edit_currency"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i>--}}
                        {{--                                        Edit--}}
                        {{--                                    </a>--}}
                        {{--                                    <br>--}}
                        {{--                                </div>--}}
                        {{--                            </td>--}}

                    </tr>
                    {{--                    @endforeach--}}

                    </tbody>
                </table>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content">
            <form action="{{route('center.service-product')}}" method="post">
                @csrf
                {{--                            @method('PUT')--}}
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Add Service / Product</h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="mb-2">Service/Product Name</div>
                        <input type="text" class="input w-full border flex-1" name="fl_service_name"  required>
                        <span id="error_code"></span>

                    </div>

                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="mb-2">Account Number</div>
                        <select name="fl_account_num" data-placeholder="Select Currency" class="select2 w-full" id="" required>
                            <option value="">----pick account number--- </option>
                            @foreach($account_numbers as $account_number)
                                <option value="{{$account_number->fl_account_num}}">{{$account_number->fl_account_name}} {{" ["}} {{$account_number->fl_account_num}} {{" ]"}} </option>
                            @endforeach

                        </select>
                    </div>

                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button data-dismiss="modal" type="reset" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-auto bg-theme-1 text-white">Add</button>
                </div>
            </form>

        </div>
    </div>

    <div class="modal" id="assign-service">
        <div class="modal__content">
            <form action="{{route('center.assign-service')}}" method="post">
                @csrf
                {{--                            @method('PUT')--}}
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Add Service / Product</h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="mb-2">Service Name</div>
                        <select name="fl_service_code" data-placeholder="Select Currency" class="select2 w-full" id="" required>
                            <option value="">----pick service name--- </option>
                            @foreach($service  as $row)
                                <option value="{{$row->fl_service_code}}">{{$row->fl_service_name}} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="mb-2">Responsible Centre</div>
                        <select name="fl_centre_code" data-placeholder="Select Currency" class="select2 w-full" id="" required>
                            <option value="">----pick account number--- </option>
                            @foreach( $centres as $row)
                                <option value="{{$row->fl_centre_code}}">{{$row->fl_centre_name}} </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="intro-y col-span-12 sm:col-span-12">
                        <div class="mb-2">Accounting Period</div>
                        <select name="fl_period_code" data-placeholder="Select Currency" class=" select2 w-full" id="" required>
                            @foreach( $period_code as $code)
                                <option value="{{$code->fl_period_code}}" >{{$code->fl_period_name}}  </option>
                            @endforeach

                        </select>
                    </div>

                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button data-dismiss="modal" type="reset" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-auto bg-theme-1 text-white">Add</button>
                </div>
            </form>

        </div>
    </div>

    @include('sweetalert::alert')
@endsection

