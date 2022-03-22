@extends('layouts.main')

@section('content')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Fees Collection
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{route('fees-report.index')}}"  class="button text-white bg-theme-1 shadow-md mr-2">
                View Fees Statements
            </a>
            <div class="pos-dropdown dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="chevron-down"></i>

                    </span>
                </button>
{{--                <div class="pos-dropdown__dropdown-box dropdown-box mt-10 absolute top-0 right-0 z-20">--}}
{{--                    <div class="dropdown-box__content box p-2">--}}
{{--                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Student</span> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-6">
            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 sm:col-span-12 xxl:col-span-3 box p-5 cursor-pointer">
                    <div class="font-medium text-base"></div>

                    <div class="intro-y box p-8">
                        <form action="{{route('invoice.remittance-post')}}"  method="post">
                            @csrf
                            <div class="">
                                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5">

                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Customer Account</div>
                                        <input type="text" id="customer_account" class="input w-full border flex-1" placeholder=""  name="fl_consumer_account" readonly>
                                        <span id="error_code"></span>

                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Remittance Amount</div>
                                        <input type="number" class="input w-full border flex-1" placeholder=" " name="fl_remittance_amount" step="0.01"   required>
                                        <span id="error_code"></span>
                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Invoice Number</div>
                                        <input type="text" class="input w-full border flex-1" id="invoice_number" placeholder=" " name="fl_invoice_number"   required>
                                        <span id="error_code"></span>
                                    </div>
                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Remittance Date</div>
                                        <input type="date" class="input w-full border flex-1" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" name="fl_remittance_date"  required>
                                        <span id="error_code"></span>
                                    </div>

                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Value Date</div>
                                        <input type="date" class="input w-full border flex-1" value="{{Carbon\Carbon::now()->format('Y-m-d')}}" name="fl_value_date"  required>
                                        <span id="error_code"></span>
                                    </div>


                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Currency</div>
                                        <select name="fl_currency_code" class="input w-full border flex-1 select2"  id="">
                                            @foreach($currency as $cry)
                                                <option value="{{$cry->fl_currency_code}}">{{$cry->fl_currency_name}}</option>
                                            @endforeach
                                        </select>
                                        <span id="error_code"></span>

                                    </div>

                                    <div class="intro-y col-span-12 sm:col-span-6">
                                        <div class="mb-2">Payment Method</div>
                                        <select name="fl_payment_code" class="input w-full border flex-1 select2"  id="">
                                            @foreach($payment_method as $pm)
                                                <option value="{{$pm->fl_payment_code}}">{{$pm->fl_payment_descr}}</option>
                                            @endforeach
                                        </select>
                                        <span id="error_code"></span>

                                    </div>
                                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
                                        <button type="reset" class="button w-24 justify-center block bg-red-200 text-gray-600">Reset</button>
                                        <button type="submit" class="button w-auto justify-center block bg-theme-1 text-white ml-2" formtarget="_blank">Process Payment</button>
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
                            <table id="data-source-1" class="table table-report table-report--bordered display  datatable w-full">
                                <caption class="text-2xl text-green-600">Select customer from list</caption>
                                <thead>
                                <tr>
                                    <th class="border-b-2 whitespace-no-wrap">Customer Account</th>
                                    <th class="border-b-2 whitespace-no-wrap">Customer Name</th>
                                    <th class="border-b-2 whitespace-no-wrap">Invoice Number</th>
                                </tr>
                                </thead>
                                <tbody >
                                @foreach($customers as $customer)
                                    <tr class="cursor-pointer">
                                        <td class="edit">{{$customer->fl_consumer_account}}</td>
                                        <td>{{$customer->fl_firstname}}   {{$customer->fl_lastname}}</td>
                                        <td>{{$customer->fl_invoice_number}}</td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>

                    </div>
        </div>
        <!-- END: Ticket -->
    </div>

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

            var table =  $("#data-source-1").DataTable();

            table.on('click', '.edit', function(){

                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')){
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#customer_account').val(data[0]);
                $('#invoice_number').val(data[2]);

                // $('#form-period-detail').attr('action', 'account-period/close-open/period/'+data[0]);
                // $('#open-close-modal').modal('show');
            })

        })
    </script>

@endsection
