@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('account-type.store')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-12">
                                <div class="mb-2">Account Type Name</div>
                                <input type="text" class="input w-full border flex-1" name="fl_account_type_name"  required>
                                @error('fl_account_type_name')
                                <div class="mb-2 text-red-600"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Account Range Start</div>
                                <input type="number" class="input w-full border flex-1" placeholder="0" name="fl_account_range_a"  required>
                                @error('fl_account_range_a')
                                <div class="mb-2 text-red-600"> {{$message}}</div>
                                @enderror
                            </div>



                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Account Range End</div>
                                <input type="number" class="input w-full border flex-1" placeholder="0"  name="fl_account_range_z" required>
                                @error('fl_account_range_z')
                                <div class="mb-2 text-red-600"> {{$message}}</div>
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
        </div>


    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <h1></h1>
        <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
            <caption class="text-2xl text-green-600">Account Types</caption>
            <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Account Type code</th>
                <th class="border-b-2 whitespace-no-wrap">Account Type name</th>
                <th class="border-b-2 whitespace-no-wrap">Account range start</th>
                <th class="border-b-2 whitespace-no-wrap">Account range end</th>
                <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
            </tr>
            </thead>
            <tbody>

            @foreach($account_types as $account_types)
                <tr>

                    <td class=" border-b">
                        {{--                                {{$rate->fl_currency_code->fl_exchange_bulletino}}--}}
                        {{$account_types->fl_acc_type_code}}

                    </td>
                    <td class=" border-b">
                        {{--                                {{$rate->fl_currency_name}} <br>--}}
                        {{--                                {{$rate->fl_currency_code->fl_base_rate_amount}}--}}
                        {{$account_types->fl_account_type_name}}

                    </td>
                    <td class=" border-b">

                        {{--                                {{$rate->fl_currency_name}} <br>--}}
                        {{--                                {{$rate->fl_currency_code->fl_dest_rate}}--}}
                        {{$account_types->fl_account_range_a}}
                    </td>
                    <td class=" border-b">

                        {{--                                {{$rate->fl_currency_name}} <br>--}}
                        {{--                                {{$rate->fl_currency_code->fl_dest_rate}}--}}
                        {{$account_types->fl_account_range_z}}
                    </td>



                    <td class="border-b w-5">
                        <div class="flex sm:justify-center items-center">
                            <a class="flex items-center mr-3 edit" href="{{route('account-type.edit',$account_types->fl_acc_type_code)}}" > <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
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


    @include('sweetalert::alert')
@endsection
