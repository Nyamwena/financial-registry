@extends('layouts.main')

@section('content')


    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

            <div class="intro-y box p-8">
                <form action="{{route('customer-add.create')}}" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Customer Number</div>
                                <input type="text" class="input w-full border flex-1" placeholder=""  name="fl_consumer_number" required>
                                @error('fl_consumer_number')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror

                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Customer Account</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_consumer_account"  required>
                                @error('fl_consumer_account')
                                <div class="mb-2 text-red-50"> {{$message}}</div>
                                @enderror
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Firstname</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_firstname"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Middle Name</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_middle_name"  >
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Lastname</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_lastname"  required>
                                <span id="error_code"></span>
                            </div>


                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Title</div>
                                <select name="fl_title" class="input w-full border flex-1"  id="">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Dr">Dr</option>

                                </select>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Gender</div>
                                <select name="fl_sex" class="input w-full border flex-1"  id="">
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Physical Address</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_physical_address"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Mailing Address</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_mailing_address"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">City</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_city"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Email</div>
                                <input type="email" class="input w-full border flex-1" placeholder=" " name="fl_email"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Mobile Number</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_mobile_number"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-12 sm:col-span-6">
                                <div class="mb-2">Telephone</div>
                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_telephone"  required>
                                <span id="error_code"></span>
                            </div>
{{--                            <div class="intro-y col-span-12 sm:col-span-6">--}}
{{--                                <div class="mb-2">Credit plan</div>--}}
{{--                                <input type="text" class="input w-full border flex-1" placeholder=" " name="fl_credit_plan"  >--}}
{{--                                <span id="error_code"></span>--}}
{{--                            </div>--}}

                            <div class="intro-y col-span-12 sm:col-span-4">
                                <div class="mb-2">Customer Active</div>
                                <select name="fl_active" class="input w-full border flex-1"  id="">
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
            <!-- END: Form Layout --><div class="intro-y col-span-6 lg:col-span-12">
                <!-- BEGIN: Form Layout -->



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
                                            Edit
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


            <!-- END: Form Layout -->
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
{{--@section('js')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}

{{--            var table =  $("#data-source-1").DataTable();--}}
{{--            table.on('click', '.edit', function(){--}}

{{--                $tr = $(this).closest('tr');--}}
{{--                if ($($tr).hasClass('child')){--}}
{{--                    $tr = $tr.prev('.parent');--}}
{{--                }--}}

{{--                var data = table.row($tr).data();--}}
{{--                console.log(data);--}}

{{--                $('#fl_payment_code').val(data[0]);--}}
{{--                $('#fl_payment_descr').val(data[2]);--}}
{{--                $('#fl_payment_short_code').val(data[1]);--}}
{{--                //   $('#fl_currency_shortcode').val(data[0]);--}}

{{--                $('#form_payment_methods').attr('action', '../monetary/currency/edit/');--}}
{{--                $('#edit_payment_methods').modal('show');--}}
{{--            })--}}

{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}


