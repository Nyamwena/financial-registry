@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('monetary.payment-method-post')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-3">
                                <div class="mb-2">Payment short code</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_payment_short_code" required>
                                <span id="error_code"></span>

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Payment description</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_payment_descr"  required>
                                <span id="error_code"></span>
                            </div>


                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Payment Method active</div>
                                <select name="fl_paymethod_active" class="input w-full border flex-1"  id="">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
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

        <div class="intro-y col-span-6 lg:col-span-12">
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
    @include('sweetalert::alert')
@endsection
