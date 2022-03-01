@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('chart.store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-5">
                                <div class="mb-2">Account Number</div>
                                <input type="text" class="input w-full border flex-1" name="fl_account_num"  required>
                                @error('fl_account_num')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-5">
                                <div class="mb-2">Account Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_account_name"  required>
                                @error('fl_account_name')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-2">
                                <div class="mb-2">Account Main Type</div>
                                <select name="fl_account_main_type" data-placeholder="Select Account Type" class="select2 w-full" id="" required>
                                    <option value="">----pick an option--- </option>
                                    @foreach($account_main as $type)
                                        <option value="{{$type->id}}">{{$type->fl_account_type}}</option>
                                    @endforeach

                                </select>
                                @error('fl_account_main_type')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Account Subtype-A</div>
                                <select name="fl_account_sub_type_a" data-placeholder="Select Account Type" class="select2 w-full" id="" required>
                                    <option value="">----pick an option--- </option>
                                    @foreach($account_type as $type)
                                        <option value="{{$type->fl_acc_type_code}}">{{$type->fl_account_type_name}}</option>
                                    @endforeach
                                </select>
                                @error('fl_account_sub_type_a')
                                <div class="mb-2 text-red-500"> {{$message}}</div>
                                @enderror

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Account Subtype-B</div>
                                <select name="fl_account_sub_type_b" data-placeholder="Select Account Type" class="select2 w-full" id="" required>
                                    <option value="">----pick an option--- </option>
                                    @foreach($account_type as $type)
                                        <option value="{{$type->fl_acc_type_code}}">{{$type->fl_account_type_name}}</option>
                                    @endforeach
                                </select>

                                @error('fl_account_sub_type_b')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Is It Bank?</div>
                                <select name="fl_account_bank" class="input w-full border flex-1"  id="" required>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                @error('fl_account_bank')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror

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

            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <h1></h1>
                <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
                    <caption class="text-2xl text-green-600">Chart Of Accounts</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Account number</th>
                        <th class="border-b-2 whitespace-no-wrap">Account name</th>
                        <th class="border-b-2 whitespace-no-wrap">Account main type</th>
                        <th class="border-b-2 whitespace-no-wrap">Account sub type A</th>
                        <th class="border-b-2 whitespace-no-wrap">Account sub type B</th>
                        <th class="border-b-2 whitespace-no-wrap">Is Bank</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($chart_accounts as $chart_account)
                        <tr>

                            <td class=" border-b">
                                {{--                                {{$rate->fl_currency_code->fl_exchange_bulletino}}--}}
                                {{$chart_account->fl_account_num}}

                            </td>
                            <td class=" border-b">
                                {{--                                {{$rate->fl_currency_name}} <br>--}}
                                {{--                                {{$rate->fl_currency_code->fl_base_rate_amount}}--}}
                                {{$chart_account->fl_account_name}}

                            </td>
                            <td class=" border-b">

                                {{--                                {{$rate->fl_currency_name}} <br>--}}
                                {{--                                {{$rate->fl_currency_code->fl_dest_rate}}--}}
                                {{$chart_account->account_type_main->fl_account_type}}
                            </td>

                            <td class=" border-b">
                                {{$chart_account->account_type_a->fl_account_type_name}}

                            </td>

                            <td class=" border-b">
                                {{$chart_account->account_type_b->fl_account_type_name}}

                            </td>

                            <td class=" border-b">
                                {{$chart_account->fl_account_bank}}

                            </td>


                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 edit" href="#" data-toggle="modal"
                                       data-target="#edit_currency"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                        Edit
                                    </a>
                                    <br>
                                </div>
                            </td>

                        </tr>


                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

