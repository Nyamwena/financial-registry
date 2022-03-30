@extends('layouts.main')

@section('content')

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('fees.structure-create')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Fees group</div>
                                <select name="fl_feegroup_code" class="input w-full border flex-1 select2"   id="" required>
                                    <option value="1">----select fees group------</option>
                                    @foreach($fees_grp as $code)
                                        <option value="{{$code->fl_feegroup_code}}">{{$code->fl_description}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Ordinance</div>
                                <select name="fl_ordinance_number" class="input w-full border flex-1 select2"   id="" required>
                                    <option value="1">----select ordinance------</option>
                                    @foreach( $ordinance as $code)
                                        <option value="{{$code->fl_ordinance_number}}">
                                            {{$code->fl_desc}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Session</div>
                                <select name="fl_session_code" class="input w-full border flex-1 select2"  id="" required>
                                    <option value="1">----select session/term------</option>
                                    @foreach( $session as $code)
                                        <option value="{{$code->id}}">{{$code->academic_session_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Service/Product</div>
                                <select name="fl_service_code" class="input w-full border flex-1 select2"   id="" required>
                                    <option value="1">----select service /product------</option>
                                    @foreach($service_code as $code)
                                        <option value="{{$code->fl_service_code}}">{{$code->fl_service_name}}

                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Currency</div>
                                <select name="fl_currency_code" class="input w-full border flex-1 select2"   id="" required>
                                    <option value="1">----select currency------</option>
                                    @foreach($currency as $code)
                                        <option value="{{$code->fl_currency_code}}">{{$code->fl_currency_name}}

                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" value="{{\Session::get('company_session_id')}}" name="fl_company_id">

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Fee Amount</div>
                                <input type="number" name="fl_amount" step=".01" class="input w-full border flex-1" required>
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
                    <caption class="text-2xl text-green-600">Fees Structure</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Fees Grp Name</th>
                        <th class="border-b-2 whitespace-no-wrap">Service Name</th>
                        <th class="border-b-2 whitespace-no-wrap">Ordinance</th>
                        <th class="border-b-2  whitespace-no-wrap">Currency</th>
                        <th class="border-b-2  whitespace-no-wrap">Fees Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fees_structure as $struct)
                    <tr>

                        <td class=" border-b">
                          {{$struct->fees_group->fl_description}}
                        </td>
                        <td class=" border-b">
                           {{$struct->service->fl_service_name}}
                        </td>
                        <td class=" border-b">
                            {{$struct->ordinance->fl_desc}}
                        </td>
                        <td class=" border-b">
                       {{$struct->currency->fl_currency_name}}
                        </td>

                        <td class=" border-b">
                            {{round($struct->fl_amount, 2)}}
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
