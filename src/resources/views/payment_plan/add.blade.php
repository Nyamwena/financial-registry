@extends('layouts.main')

@section('content')

    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                    <div class="font-medium text-base"></div>

                    <div class="intro-y box p-8">
                        <form action="{{route('payment-plan.store')}}" method="post">
                            @csrf
                            <div class="">
                                <div class="grid grid-cols-12 gap-6 row-gap-5 mt-5">

                                    <div class="intro-y col-span-3 sm:col-span-12">
                                        <div class="mb-2">Customer Number</div>
                                        <input type="text" class="input w-full border flex-1" id="customer_number" placeholder="0" name="fl_customer_number"  readonly required>
                                        @error('fl_customer_number')
                                        <div class="mb-2 text-red-600"> {{$message}}</div>
                                        @enderror
                                    </div>

                                    <div class="intro-y col-span-3 sm:col-span-12">
                                        <div class="mb-2">Date Requested</div>
                                        <input type="date" class="input w-full border flex-1" placeholder="Date" name="fl_request_date"  required>
                                        @error('fl_request_date')
                                        <div class="mb-2 text-red-600"> {{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="intro-y col-span-3 sm:col-span-12">
                                        <div class="mb-2">Plan Amount</div>
                                        <input type="number" class="input w-full border flex-1" placeholder="0"  name="fl_plan_amount" required>
                                        @error('fl_plan_amount')
                                        <div class="mb-2 text-red-600"> {{$message}}</div>
                                        @enderror

                                    </div>

                                    <div class="intro-y col-span-3 sm:col-span-12">
                                        <div class="mb-2">Number of Installments</div>
                                        <input type="number" class="input w-full border flex-1" placeholder="0"  name="fl_instalments" required>
                                        @error('fl_instalments')
                                        <div class="mb-2 text-red-600"> {{$message}}</div>
                                        @enderror

                                    </div>

                                    <div class="intro-y col-span-3 sm:col-span-12">
                                        <div class="mb-2">Due Date</div>
                                        <input type="date" class="input w-full border flex-1" placeholder="0"  name="due_date" required>
                                        @error('due_date')
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

                </div>


            </div>
        </div>
        <!-- END: Item List -->
        <!-- BEGIN: Ticket -->
        <div class="col-span-12 lg:col-span-6">

            <div class="pos__ticket box p-2 mt-5" >
                <div class="intro-y datatable-wrapper box p-5 mt-5">
                    <h1></h1>
                    <table id="data-source-3" class="table table-report table-report--bordered display  datatable w-full">
                        <caption class="text-2xl text-green-600">Select customer from list</caption>
                        <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">Customer Number</th>
                            <th class="border-b-2 whitespace-no-wrap">Customer Name</th>
                        </tr>
                        </thead>
                        <tbody >
                        @foreach($customers as $customer)
                            <tr class="cursor-pointer">
                                <td class="edit">{{$customer->fl_consumer_number}}</td>
                                <td class="edit">{{$customer->fl_firstname}}   {{$customer->fl_lastname}}</td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- END: Ticket -->
    </div>

    <div class="grid grid-cols-2 gap-6 mt-5">



        <div class="intro-y col-span-3 lg:col-span-6">
            <!-- BEGIN: Form Layout -->



            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <h1></h1>
                <table id="data-source-1" class="table table-report table-report--bordered display datatable w-full">
                    <caption class="text-2xl text-green-600">Payment Plans</caption>
                    <thead>
                    <tr>
                        <th class="border-b-2 whitespace-no-wrap">Payment Plan Ref</th>
                        <th class="border-b-2 whitespace-no-wrap">Date Requested</th>
                        <th class="border-b-2 whitespace-no-wrap">Customer Number</th>
                        <th class="border-b-2 whitespace-no-wrap">Recommendations</th>
                        <th class="border-b-2 whitespace-no-wrap">Approved By</th>
                        <th class="border-b-2 whitespace-no-wrap">Plan Amount</th>
                        <th class="border-b-2  whitespace-no-wrap">ACTIONS</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($payment_plan as $payment_plans)
                        <tr>

                            <td class=" border-b">

                                {{$payment_plans->fl_payment_plan_ref}}

                            </td>
                            <td class=" border-b">

                                {{$payment_plans->fl_request_date}}

                            </td>
                            <td class=" border-b">


                                {{$payment_plans->fl_customer_number}}
                            </td>


                            <td class=" border-b">
                                @if($payment_plans->fl_recommended_a != null )
                                    By: {{$payment_plans->fl_recommended_a}} <br>
                                    On: {{$payment_plans->fl_date_recommended_a}} <br>
                                @endif

                                @if($payment_plans->fl_recommended_b != null)
                                    By: {{$payment_plans->fl_recommended_b}} <br>
                                    On: {{$payment_plans->fl_date_recommended_b}}
                                @endif

                            </td>

                            <td class=" border-b">
                                {{$payment_plans->fl_approved_by}}

                            </td>

                            <td class=" border-b">
                                {{$payment_plans->fl_plan_amount}}

                            </td>


                            <td class="border-b w-5">
                                <div class="flex sm:justify-center items-center">
                                    <a class="flex items-center mr-3 edit" href="#" data-toggle="modal"
                                       data-target="#create_payment_plan"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
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
        <div class="modal" id="edit_payment_plan">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">

                    </h2>
                </div>

                <form action="#" id="form-payment_plan" method="post">
                    @csrf
                    <div class="">
                        <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">


                            <div class="intro-y col-span-6 sm:col-span-6">
                                <div class="mb-2">Date Requested</div>
                                <input type="date" class="input w-full border flex-1" name="fl_request_date"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-6 sm:col-span-6">
                                <div class="mb-2">Customer Number</div>
                                <input type="text" class="input w-full border flex-1" placeholder="Customer No" name="fl_customer_number"  required>
                                <span id="error_code"></span>
                            </div>
                            <div class="intro-y col-span-6 sm:col-span-6">
                                <div class="mb-2">Customer Account</div>
                                <input type="text" class="input w-full border flex-1" placeholder="0"  name="fl_customer_account" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-6 sm:col-span-6">
                                <div class="mb-2">Recommended_By_A</div>
                                <input type="text" class="input w-full border flex-1" placeholder="0"  name="fl_recommended_a" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-6 sm:col-span-4">
                                <div class="mb-2">Date Recommended_By_A</div>
                                <input type="date" class="input w-full border flex-1" placeholder="0"  name="fl_date_recommended_a" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-6 sm:col-span-6">
                                <div class="mb-2">Recommended_By_B</div>
                                <input type="text" class="input w-full border flex-1" placeholder="0"  name="fl_recommended_b" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-6 sm:col-span-6">
                                <div class="mb-2">Date Recommended_By_B</div>
                                <input type="date" class="input w-full border flex-1" placeholder="0"  name="fl_date_recommended_b" required>
                                <span id="error_code"></span>

                            </div>

                            <div class="intro-y col-span-6 sm:col-span-4">
                                <div class="mb-2">Approved By</div>
                                <input type="text" class="input w-full border flex-1" placeholder="0"  name="fl_approved_by" required>
                                <span id="error_code"></span>
                            </div>

                            <div class="intro-y col-span-6 sm:col-span-4">
                                <div class="mb-2">Approved Date</div>
                                <input type="date" class="input w-full border flex-1" placeholder="0"  name="fl_approved_date" required>
                                <span id="error_code"></span>
                            </div>

                            <div class="intro-y col-span-6 sm:col-span-4">
                                <div class="mb-2">Plan Amount</div>
                                <input type="double" class="input w-full border flex-1" placeholder="0"  name="fl_plan_amount" required>
                                <span id="error_code"></span>
                            </div>

                            <div class="intro-y col-span-6 sm:col-span-3">
                                <div class="mb-2">Number of Installments</div>
                                <input type="number" class="input w-full border flex-1" placeholder="0"  name="fl_instalments" required>
                                <span id="error_code"></span>
                            </div>

                        </div>

                        {{--                        <input type="text" class="input w-full border flex-1" id="fl_payment_ref" name="fl_payment_ref">--}}
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                        <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

@section('js')

    <script>
        $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('pos.live-search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('#customer').html(data.customer_data);

                        console.log('Student data' , data.customer_data);
                        //console.log('---', data.total_data)
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                // console.log('great')
                var query = $(this).val();

                fetch_customer_data(query);
            });
        });
    </script>


    <script>


        $(document).ready(function () {

            var table =  $("#data-source-3").DataTable();

            table.on('click', '.edit', function(){

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#customer_number').val(data[0]);


                // $('#form-period-detail').attr('action', 'account-period/close-open/period/'+data[0]);
                // $('#open-close-modal').modal('show');
            })

        })
    </script>

@endsection
