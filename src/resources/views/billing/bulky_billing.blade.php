@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12" >
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                    <div class="font-medium text-base">
                        SELECT FEES GROUP
                    </div>

                    <div class="intro-y box p-12">
                        <div class="lg:flex intro-y"  >

                            <form action="{{route('invoice-billing.get-customers')}}" method="post">
                                @csrf

                                <select name="fee_group_code" id="" class="select2 input input--lg box w-full lg:w-full mt-3 lg:mt-0 ml-auto col-12"  onchange="this.form.submit()">
                                    <option value="" selected disabled>Select fees group</option>
                                    @foreach($fees_group as $group)
                                        <option value="{{$group->fl_feegroup_code}}">{{$group->fl_description}}</option>
                                    @endforeach
                                </select>

                            </form>
                            <span class="text-sm px-2">
                                <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button justify-center block bg-theme-1 text-white ml-2 w-auto">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Bill Students
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
                        <caption class="text-2xl text-green-600">customer  list</caption>
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">Student Number</th>
                            <th class="border-b-2 whitespace-no-wrap">Customer Name</th>
                            <th class="border-b-2 whitespace-no-wrap">Email</th>
                            <th class="border-b-2 whitespace-no-wrap">Mobile</th>
                        </tr>
                        </thead>
                        <tbody >

                @isset($students)
                        @foreach($students as $customer)

                            <tr class="cursor-pointer">
                                <td>{{$customer->fl_consumer_account}}</td>
                                <td>{{$customer->fl_title}} {{'.'}} {{ " " }} {{$customer->fl_lastname}}{{ " " }} {{$customer->fl_firstname}}  </td>
                                <td>{{$customer->fl_email}}</td>
                                <td>Mobile#:  {{$customer->fl_mobile_number}}<br>
                                    Telephone#: {{$customer->fl_telephone}}
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
        <div class="modal__content modal__content--xl p-10 text-center">
            <form action="{{route('invoice-billing.bulk-billing')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-span-12 sm:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">Are you sure you want to bill</h2>
                    </div>

                    <div class="col-span-12 sm:col-span-6" style="display: none">
                        <label></label>

                        @isset($students)
                        @foreach($students  as $person)


                            <input type="checkbox"  class="input w-full border flex-1"   value="{{$invoice_generator_prefix.$incrementer++}}" name="invoice_num[]" checked>


                        @endforeach

                        <input type="checkbox"  class="input w-full border flex-1"   value="{{$incrementer}}" name="invoice_generator" checked>
                        @endisset
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <label for=""> Select Service to Bill</label>
                        <select name="fee_structure_service"   class="input w-full border flex-1 select2">
                            @isset($fees_structure)
                            @foreach($fees_structure as $fees)
                                <option value="{{$fees->id}}">{{$fees->service->fl_service_name}} {{"("}} {{$fees->fl_amount}} {{")"}}</option>
                            @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for=""> Due Date</label>
                        <input type="date"  class="input w-full border flex-1"  name="fl_due_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for=""> Service Date</label>
                        <input type="date"  class="input w-full border flex-1"  name="fl_service_date" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                    </div>
                    <input type="hidden" value="{{\Session::get('company_session_id')}}" name="fl_company_id">

                    <div class="col-span-12 sm:col-span-6" >
                        @isset($students)
                        @foreach($students as $person)
                            <input type="hidden" value="{{$person->fl_consumer_account}}" name="fl_consumer_account[]" class="input w-full border flex-1">
                        @endforeach
                            @endisset

                    </div>

                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button data-dismiss="modal" type="reset" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-auto bg-theme-1 text-white">Bill Students</button>
                </div>

            </form>

        </div>
    </div>
@endsection
